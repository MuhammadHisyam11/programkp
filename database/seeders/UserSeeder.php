<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        DB::table('Users')->insert([
            'name' => 'Admin',
            'npm' => '1111111111',
            'username' => 'adminUP',
            'email' => 'adminhelpdeskup@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('password'),
            'remember_token' => Str::random(60),
        ]);

        DB::table('Users')->insert([
            'name' => 'Mahasiswa',
            'npm' => '2222222222',
            'username' => 'mahasiswa',
            'email' => 'mahasiswahelpdeskup@gmail.com',
            'role' => 'mahasiswa',
            'password' => bcrypt('password'),
            'remember_token' => Str::random(60),
        ]);
    }
}
