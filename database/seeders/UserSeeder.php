<?php

namespace Database\Seeders;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'Admin']);

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $user=User::updateOrCreate([
            'name'      => 'admin',
            'email'     => 'admin@gmail.com',
            'password'  => bcrypt(87654321),
            'institute_id'=>1,
            'status'    => 1
        ]);
        $user->assignRole([$role->id]);
        $user=User::updateOrCreate([
            'name'      => 'dev',
            'email'     => 'dev@gmail.com',
            'password'  => bcrypt(87654321),
            'institute_id'=>1,
            'status'    => 1
        ]);
        $user->assignRole([$role->id]);
        $user=User::updateOrCreate([
            'name'      => 'Super Admin',
            'email'     => 'Info@schoolcollege.xyz',
            'password'  => bcrypt('009988'),
            'institute_id'=>1,
            'status'    => 1
        ]);
        $user->assignRole([$role->id]);
    }
}
