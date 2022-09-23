<?php

namespace Database\Seeders;

use App\Models\User;
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
        $user = [
            [
                'name' => 'Admin',
                'email' => 'admin@app.com',
                'role' => 'admin',
                'password' => md5('123456'),
            ],
            [
                'name' => 'Admin2',
                'email' => 'admin2@app.com',
                'role' => 'admin',
                'password' => md5('123456'),
            ],
            [
                'name' => 'Teacher',
                'email' => 'teacher@app.com',
                'role' => 'teacher',
                'password' => md5('123456'),
            ],
            [
                'name' => 'Teacher2',
                'email' => 'teacher2@app.com',
                'role' => 'teacher',
                'password' => md5('123456'),
            ],
            [
                'name' => 'Student',
                'email' => 'student@app.com',
                'role' => 'student',
                'password' => md5('123456'),
            ],
            [
                'name' => 'Student2',
                'email' => 'student2@app.com',
                'role' => 'student',
                'password' => md5('123456'),
            ]
        ];

        foreach ($user as $user) {
            User::create($user);
        }
    }
}
