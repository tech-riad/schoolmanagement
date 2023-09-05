<?php

namespace Database\Seeders;

use App\Models\SubjectType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubjectType::create([
            'name' => 'regular',
            'is_common' => 1,
        ]);

        SubjectType::create([
            'name' => 'irregular',
        ]);

        SubjectType::create([
            'name' => 'optional',
        ]);
    }
}
