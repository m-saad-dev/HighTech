<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'name' => 'admin',
                'user_name' => 'sahabatok',
                'email' => 'admin@admin.com',
                'mobile' => '01557011197',
                'password' => Hash::make('admin@admin.com'),
                'status' => 2,
                'code' => uniqid()
            ]
        ];
        User::insert($data);
    }
}
