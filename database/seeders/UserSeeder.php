<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
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
        User::create([
            'name' => 'admin',
            'departemen' => 'admin',
            'divisi' => 'admin',
            'username'=> 'admin@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('admin'),
            'remember_token' => Str::random(60)
        ]);

        User::create([
            'name' => 'manager',
            'username'=> 'manager@gmail.com',
            'departemen' => 'manager',
            'divisi' => 'manager',
            'role' => 'manager',
            'password' => bcrypt('manager'),
            'remember_token' => Str::random(60)
        ]);

        User::create([
            'name' => 'supervisor',
            'username'=> 'supervisormobil@gmail.com',
            'departemen' => 'supervisor',
            'divisi' => 'mobil',
            'role' => 'supervisor',
            'password' => bcrypt('supervisor'),
            'remember_token' => Str::random(60)
        ]);

        User::create([
            'name' => 'supervisor',
            'username'=> 'supervisormotor@gmail.com',
            'departemen' => 'supervisor',
            'divisi' => 'motor',
            'role' => 'supervisor',
            'password' => bcrypt('supervisor'),
            'remember_token' => Str::random(60)
        ]);

        User::create([
            'name' => 'Sifani Affan',
            'username'=> 'pemohon@gmail.com',
            'departemen' => 'IF UMM',
            'divisi' => 'Organisasi',
            'role' => 'pemohon',
            'password' => bcrypt('pemohon'),
            'remember_token' => Str::random(60)
        ]);


    }
}

