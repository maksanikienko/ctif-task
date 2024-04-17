<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usersData = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin'),
            ],
            [
                'name' => 'Operator',
                'email' => 'operator@gmail.com',
                'password' => Hash::make('operator'),
            ],
            [
                'name' => 'Operator Raion',
                'email' => 'operator_raion@gmail.com',
                'password' => Hash::make('operator_raion'),
            ],
        ];

        foreach ($usersData as $userData) {
            $user = User::create($userData);

            if ($user->email === 'admin@gmail.com') {
                $role = Role::where('name', 'admin')->first();
            } elseif ($user->email === 'operator@gmail.com') {
                $role = Role::where('name', 'operator')->first();
            } elseif ($user->email === 'operator_raion@gmail.com') {
                $role = Role::where('name', 'operator_raion')->first();
            }

            $user->roles()->attach($role->id);
        }
    }
}
