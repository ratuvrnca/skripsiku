<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kriteria;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kriteria::insert([
            [
                'kriteria' => 'Penting',
                'bobot' => '0',
                'urutan' => 1,
                'tipe' => 'benefit',
            ],
            [
                'kriteria' => 'Menarik',
                'bobot' => '0',

                'urutan' => 2,
                'tipe' => 'benefit',
            ],
            [
                'kriteria' => 'Aktualitas',
                'bobot' => '0',

                'urutan' => 3,
                'tipe' => 'benefit',
            ],
            [
                'kriteria' => 'Hal Baru',
                'bobot' => '0',

                'urutan' => 4,
                'tipe' => 'benefit',
            ],
            [
                'kriteria' => 'Ketepatan',
                'bobot' => '0',

                'urutan' => 5,
                'tipe' => 'benefit',
            ],
            [
                'kriteria' => 'Kemanusiaan',
                'bobot' => '0',

                'urutan' => 6,
                'tipe' => 'cost',
            ],
            [
                'kriteria' => 'Konflik',
                'bobot' => '0',

                'urutan' => 7,
                'tipe' => 'cost',
            ],
        ]);
    }
}
