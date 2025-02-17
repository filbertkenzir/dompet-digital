<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userdata = [
            [
                'name' => 'kenzi',
                'role' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin123'),
            ],
            [
                'name' => 'filbert',
                'role' => 'bank',
                'email' => 'bank@gmail.com',
                'password' => bcrypt('bank123'),
            ],
        ];

        foreach ($userdata as $val) {
            User::create($val);
        }
    }
}
