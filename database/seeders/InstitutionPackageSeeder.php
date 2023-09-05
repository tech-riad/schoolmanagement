<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InstitutionPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sql  = public_path('seller_package_sql/institution_packages.sql');

        DB::unprepared(file_get_contents($sql));

        $command1 =  "mysql -h".env('DB_HOST')." -u".env('DB_USERNAME')." ".(env('DB_PASSWORD')?"-p'".env('DB_PASSWORD')."'":'')." ".env('DB_DATABASE')." < ".$sql;
        exec($command1);

    }
}
