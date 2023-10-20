<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'email' => 'admin@gmail.com',
                'username' => 'Admin',
                'password' => bcrypt ('admin123'),
                'roles' => 'ADMIN'
            ]  ,    
            [
                'email' => 'manager@gmail.com',
                'username' => 'Manager',
                'password' => bcrypt ('manager123'),
                'roles' => 'MANAGER'
            ],
            [
                'email' => 'employee@gmail.com',
                'username' => 'Employee',
                'password' => bcrypt ('employee'),
                'roles' => 'EMPLOYEE'
            ]      
        ];

        foreach ($users as $key => $value) {
            User::create($value);
        }
    }
}
