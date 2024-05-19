<?php

namespace Database\Seeders;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\MatrikDetail;
use App\Models\Matriks;
use Illuminate\Database\Seeder;

class Matriks2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $alternatifs = Alternatif::all();
        $kriterias = Kriteria::all();

        $data = [
            [
                'kode' => 'A1',
                'kriteria_1' => 7,
                'kriteria_2' => 7,
                'kriteria_3' => 6,
                'kriteria_4' => 6,
                'kriteria_5' => 7,
                'kriteria_6' => 6,
                'kriteria_7' => 7,
            ],
            [
                'kode' => 'A2',
                'kriteria_1' => 7,
                'kriteria_2' => 7,
                'kriteria_3' => 8,
                'kriteria_4' => 7,
                'kriteria_5' => 7,
                'kriteria_6' => 6,
                'kriteria_7' => 6,
            ],
            [
                'kode' => 'A3',
                'kriteria_1' => 6,
                'kriteria_2' => 6,
                'kriteria_3' => 7,
                'kriteria_4' => 6,
                'kriteria_5' => 7,
                'kriteria_6' => 6,
                'kriteria_7' => 6,
            ],
            [
                'kode' => 'A4',
                'kriteria_1' => 8,
                'kriteria_2' => 9,
                'kriteria_3' => 8,
                'kriteria_4' => 7,
                'kriteria_5' => 8,
                'kriteria_6' => 7,
                'kriteria_7' => 1,
            ],
            [
                'kode' => 'A5',
                'kriteria_1' => 8,
                'kriteria_2' => 9,
                'kriteria_3' => 8,
                'kriteria_4' => 8,
                'kriteria_5' => 7,
                'kriteria_6' => 1,
                'kriteria_7' => 1,
            ],
            [
                'kode' => 'A6',
                'kriteria_1' => 8,
                'kriteria_2' => 8,
                'kriteria_3' => 8,
                'kriteria_4' => 8,
                'kriteria_5' => 8,
                'kriteria_6' => 7,
                'kriteria_7' => 1,
            ],
            [
                'kode' => 'A7',
                'kriteria_1' => 7,
                'kriteria_2' => 7,
                'kriteria_3' => 7,
                'kriteria_4' => 7,
                'kriteria_5' => 7,
                'kriteria_6' => 6,
                'kriteria_7' => 6,
            ],
            [
                'kode' => 'A8',
                'kriteria_1' => 7,
                'kriteria_2' => 6,
                'kriteria_3' => 6,
                'kriteria_4' => 6,
                'kriteria_5' => 6,
                'kriteria_6' => 6,
                'kriteria_7' => 6,
            ],
            [
                'kode' => 'A9',
                'kriteria_1' => 6,
                'kriteria_2' => 6,
                'kriteria_3' => 7,
                'kriteria_4' => 6,
                'kriteria_5' => 7,
                'kriteria_6' => 7,
                'kriteria_7' => 6,
            ],
            [
                'kode' => 'A10',
                'kriteria_1' => 7,
                'kriteria_2' => 7,
                'kriteria_3' => 7,
                'kriteria_4' => 7,
                'kriteria_5' => 7,
                'kriteria_6' => 6,
                'kriteria_7' => 1,
            ],
            [
                'kode' => 'A11',
                'kriteria_1' => 7,
                'kriteria_2' => 6,
                'kriteria_3' => 6,
                'kriteria_4' => 6,
                'kriteria_5' => 7,
                'kriteria_6' => 6,
                'kriteria_7' => 1,
            ],
            [
                'kode' => 'A12',
                'kriteria_1' => 7,
                'kriteria_2' => 7,
                'kriteria_3' => 7,
                'kriteria_4' => 7,
                'kriteria_5' => 7,
                'kriteria_6' => 8,
                'kriteria_7' => 6,
            ],
            [
                'kode' => 'A13',
                'kriteria_1' => 8,
                'kriteria_2' => 8,
                'kriteria_3' => 7,
                'kriteria_4' => 8,
                'kriteria_5' => 7,
                'kriteria_6' => 7,
                'kriteria_7' => 1,
            ],
            [
                'kode' => 'A14',
                'kriteria_1' => 6,
                'kriteria_2' => 7,
                'kriteria_3' => 7,
                'kriteria_4' => 6,
                'kriteria_5' => 6,
                'kriteria_6' => 6,
                'kriteria_7' => 1,
            ],
            [
                'kode' => 'A15',
                'kriteria_1' => 6,
                'kriteria_2' => 7,
                'kriteria_3' => 6,
                'kriteria_4' => 7,
                'kriteria_5' => 6,
                'kriteria_6' => 6,
                'kriteria_7' => 6,
            ],
            [
                'kode' => 'A16',
                'kriteria_1' => 7,
                'kriteria_2' => 7,
                'kriteria_3' => 7,
                'kriteria_4' => 7,
                'kriteria_5' => 7,
                'kriteria_6' => 6,
                'kriteria_7' => 1,
            ],
            [
                'kode' => 'A17',
                'kriteria_1' => 6,
                'kriteria_2' => 6,
                'kriteria_3' => 6,
                'kriteria_4' => 6,
                'kriteria_5' => 6,
                'kriteria_6' => 6,
                'kriteria_7' => 6,
            ],
            [
                'kode' => 'A18',
                'kriteria_1' => 6,
                'kriteria_2' => 6,
                'kriteria_3' => 6,
                'kriteria_4' => 6,
                'kriteria_5' => 6,
                'kriteria_6' => 6,
                'kriteria_7' => 1,
            ],
            [
                'kode' => 'A19',
                'kriteria_1' => 7,
                'kriteria_2' => 6,
                'kriteria_3' => 6,
                'kriteria_4' => 6,
                'kriteria_5' => 6,
                'kriteria_6' => 6,
                'kriteria_7' => 1,
            ],
            [
                'kode' => 'A20',
                'kriteria_1' => 7,
                'kriteria_2' => 6,
                'kriteria_3' => 6,
                'kriteria_4' => 6,
                'kriteria_5' => 6,
                'kriteria_6' => 6,
                'kriteria_7' => 1,
            ],
        ];

        $i = 0;
        foreach ($data as $alternatif) {
            $matrik = Matriks::create([
                'kode' => $alternatif['kode'],
                'user_id' => 3
            ]);
            foreach ($kriterias as $kriteria) {
                MatrikDetail::create([
                    'matrik_id' => $matrik->id,
                    'kriteria_id' => $kriteria->id,
                    'nilai' => isset($alternatif['kriteria_' . $kriteria->id]) ? $alternatif['kriteria_' . $kriteria->id] : 0,
                ]);
            }
            $i++;
        }
    }
}
