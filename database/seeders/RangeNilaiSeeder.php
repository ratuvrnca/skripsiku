<?php

namespace Database\Seeders;

use App\Models\Rangenilai;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RangeNilaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Rangenilai::insert([
            [
                'keterangan' => 'Sangat Baik',
                'nilai' => '10',
            ],
            [
                'keterangan' => 'Baik',
                'nilai' => '8-9',
            ],
            [
                'keterangan' => 'Cukup',
                'nilai' => '6-7',
            ],
            [
                'keterangan' => 'Kurang',
                'nilai' => '4-5',
            ],
            [
                'keterangan' => 'Sangat Kurang',
                'nilai' => '1-3',
            ],
        ]);
    }
}
