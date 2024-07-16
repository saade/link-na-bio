<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::insert([
            'name' => 'Saade',
            'email' => 'saade@laravel.local',
            'password' => '$2y$12$bVhfHbUfYdQQeIKU0nR50u2sbFhswG.QcPeMY2Mo9wwa6HPEW9Ak.', // 123123123
            'remember_token' => 'Cjsm9nleSJYjwwvtnjKqy1xvN51C45PTj71WwsOS2o2hGwOA7SeOloIxdXIu',
        ]);
    }
}
