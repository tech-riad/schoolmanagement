<?php

namespace Database\Seeders;

use App\Models\Session;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Session::create([
            'uuid'         => (string) Str::uuid(),
            'title'        => '2023',
            'is_active' => 1
        ]);
        Session::create([
            'uuid'         => (string) Str::uuid(),
            'title'        => '2024',
            'is_active' => 1
        ]);
    }
}
