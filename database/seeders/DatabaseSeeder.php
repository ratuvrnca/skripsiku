<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Alternatif;
use App\Models\AlternatifType;
use App\Models\Kriteria;
use App\Models\KriteriaType;
use App\Models\Matriks;
use App\Models\Normalisasi;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'role' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password')
        ]);
        User::create([
            'name' => 'Wahyu Nurdiyanto',
            'role' => 'user',
            'email' => 'wahyun@gmail.com',
            'password' => bcrypt('password')
        ]);
        User::create([
            'name' => 'Ronny Wicaksono',
            'role' => 'user',
            'email' => 'ronnyw@gmail.com',
            'password' => bcrypt('password')
        ]);
        User::create([
            'name' => 'Rochmat Shobirin',
            'role' => 'user',
            'email' => 'rochmats@gmail.com',
            'password' => bcrypt('password')
        ]);
        User::create([
            'name' => 'Yusuf Rifai',
            'role' => 'user',
            'email' => 'yusufr@gmail.com',
            'password' => bcrypt('password')
        ]);
        User::create([
            'name' => 'Muhammad Iqbal',
            'role' => 'user',
            'email' => 'miqbal@gmail.com',
            'password' => bcrypt('password')
        ]);
        User::create([
            'name' => 'Bambang H Irawanto',
            'role' => 'user',
            'email' => 'bambanghi@gmail.com',
            'password' => bcrypt('password')
        ]);
        User::create([
            'name' => 'Imadudin Muhammad',
            'role' => 'user',
            'email' => 'imadudinm@gmail.com',
            'password' => bcrypt('password')
        ]);
        User::create([
            'name' => 'Dhina Chahyanti',
            'role' => 'user',
            'email' => 'dhinac@gmail.com',
            'password' => bcrypt('password')
        ]);
        User::create([
            'name' => 'Deasy Mayasari',
            'role' => 'user',
            'email' => 'deasym@gmail.com',
            'password' => bcrypt('password')
        ]);
        User::create([
            'name' => 'Ferry Agusta',
            'role' => 'user',
            'email' => 'ferrya@gmail.com',
            'password' => bcrypt('password')
        ]);
        User::create([
            'name' => 'Widodo Irianto',
            'role' => 'user',
            'email' => 'widodoi@gmail.com',
            'password' => bcrypt('password')
        ]);
        User::create([
            'name' => 'Imam Kusnin',
            'role' => 'user',
            'email' => 'imamk@gmail.com',
            'password' => bcrypt('password')
        ]);
        $this->call([
            KriteriaSeeder::class,
            AlternatifSeeder::class,
            MatriksSeeder::class,
            Matriks2Seeder::class,
            Matriks3Seeder::class,
            Matriks4Seeder::class,
            Matriks5Seeder::class,
            Matriks6Seeder::class,
            Matriks7Seeder::class,
            Matriks8Seeder::class,
            Matriks9Seeder::class,
            Matriks10Seeder::class,
            Matriks11Seeder::class,
        ]);
    }
}
