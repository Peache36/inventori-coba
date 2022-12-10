<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'superadmin',
                'email' => 'superadmin@gmail.com',
                'password' => bcrypt('password'),
                'division' => 'superadmin',
            ],
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('password'),
                'division' => 'admin',
            ],
            [
                'name' => 'coba',
                'email' => 'coba@gmail.com',
                'password' => bcrypt('12345'),
                'division' => 'admin',
            ],
        ];

        foreach ($data as $row) {
            User::create([
                'name' => $row['name'],
                'email' => $row['email'],
                'password' => $row['password'],
                'division' => $row['division'],
            ]);
        }
    }
}
