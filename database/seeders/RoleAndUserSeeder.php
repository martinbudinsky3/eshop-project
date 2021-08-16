<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class RoleAndUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create([
            'name' => 'ADMIN',
            'description' => 'ADMIN role'
        ]);

        $user = User::create([
            'email' => 'admin@example.com',
            'password' => bcrypt('12345678'),
            'phone' => '0902333444'
        ]);

        $user->roles()->attach($role->id);
    }
}
