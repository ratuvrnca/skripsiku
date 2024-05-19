<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Matriks;
use App\Models\Normalisasi;
use App\Models\Normalisasi2;
use App\Models\Normalisasi_Terbobot;
use App\Models\Yi;
use App\Models\Result;
use Normalizer;

class NormalisasiController extends Controller
{
    public function normalisasi()
    {
        $matriks = Matriks::uniqueMatrix();
        $kriterias = Kriteria::all();

        $nilaiKriteria = [];
        foreach ($matriks as $data) {
            foreach ($kriterias as $kriteria) {
                if (!isset($nilaiKriteria[$kriteria->id])) $nilaiKriteria[$kriteria->id] = 0;
                $nilaiKriteria[$kriteria->id] += pow($data->kriteria($kriteria->id), 2);
            }
        }

        foreach ($nilaiKriteria as $index => $nilai) {
            Normalisasi::create([
                'kriteria_id' => $index,
                'nilai' => sqrt($nilai)
            ]);
        }
        return redirect()->route('result.index');
    }

    public function normalisasi2()
    {
        $normalisasi = Normalisasi::first()->pluck('nilai', 'kriteria_id')->all();
        $kriterias = Kriteria::all();
        $matriks = Matriks::uniqueMatrix();

        foreach ($matriks as $data) {
            foreach ($kriterias as $kriteria) {
                Normalisasi2::create([
                    'kode' => $data->kode,
                    'kriteria' => $kriteria->id,
                    'nilai' => $data->kriteria($kriteria->id) / $normalisasi[$kriteria->id]
                ]);
            }
        }
        return redirect()->route('result.index');
    }

    public function normalisasiTerbobot()
    {
        $matriks = Matriks::uniqueMatrix();

        $normalisasi_step2 = Normalisasi2::orderBy('id', 'ASC')->get();
        $normalisasi2 = [];
        foreach ($normalisasi_step2 as $item) {
            if (!isset($normalisasi2[$item->kode])) $normalisasi2[$item->kode] = [];
            $normalisasi2[$item->kode][intval($item->kriteria)] = $item->nilai;
        }

        $bobots = Kriteria::all();
        foreach ($matriks as $data) {
            foreach ($bobots as $bobot) {
                if (floatval($bobot->bobot) === 0) {
                    return redirect()->back()->with('error', 'Pastikan anda telah melakukan generate terhadap Nilai ROC');
                }
                Normalisasi_Terbobot::create([
                    'kode' => $data->kode,
                    'kriteria' => $bobot->id,
                    'nilai' => $normalisasi2[$data->kode][$bobot->id] * $bobot->bobot,
                ]);
            }
        }

        return redirect()->route('result.index');
    }

    public function yiMax()
    {
        $normalisasi_terbobot_model = Normalisasi_Terbobot::orderBy('id', 'ASC')->get();
        $normalisasi_terbobot = [];
        foreach ($normalisasi_terbobot_model as $item) {
            if (!isset($normalisasi_terbobot[$item->kode])) $normalisasi_terbobot[$item->kode] = [];
            $normalisasi_terbobot[$item->kode][intval($item->kriteria)] = $item->nilai;
        }

        $category = Kriteria::get();
        $c = [];

        for ($i = 0; $i < count($category); $i++) {
            $c[$i] = (object) [
                'kriteria' => $category[$i]->id,
                'tipe' => $category[$i]->tipe
            ];
        }

        $max_values = [];
        $min_values = [];
        $condition_max = true;
        $condition_min = true;

        for ($i = 0; $i < count($c); $i++) {
            if ($c[$i]->tipe !== 'benefit') {
                $condition_max = false;
                break;
            }
        }

        for ($i = 0; $i < count($c); $i++) {
            if ($c[$i]->tipe !== 'cost') {
                $condition_min = false;
                break;
            }
        }

        foreach ($normalisasi_terbobot as $key => $terbobot) {
            $max_value = 0;
            if ($condition_max) {
                $max_value = array_sum($terbobot);
            } else {
                for ($i = 0; $i < count($c); $i++) {
                    if ($c[$i]->tipe !== 'benefit') {
                        continue;
                    }
                    // if($key=="A10") print($terbobot[$c[$i]->kriteria] . "<br>");
                    $max_value += $terbobot[$c[$i]->kriteria];
                }
            }
            $max_values[$key] = $max_value;
        }


        foreach ($normalisasi_terbobot as $key => $terbobot) {
            $min_value = 0;
            if ($condition_min) {
                $min_value = array_sum($terbobot);
            } else {
                for ($i = 0; $i < count($c); $i++) {
                    if ($c[$i]->tipe !== 'cost') {
                        continue;
                    }
                    $min_value += $terbobot[$c[$i]->kriteria];
                }
            }
            $min_values[$key] = $min_value;
        }

        foreach ($normalisasi_terbobot as $i => $item) {
            Yi::create([
                'kode' => $i,
                'min' => $min_values[$i],
                'max' =>  $max_values[$i],
                'minmax' => $max_values[$i] - $min_values[$i],
            ]);
        }

        return redirect()->route('result.index');
    }

    public function result()
    {
        $yi = Yi::all();
        $judul_berita = Alternatif::all();
        for ($i = 0; $i < count($yi); $i++) {
            Result::create([
                'kode' => $yi[$i]->kode,
                'judul_berita' => Alternatif::where('kode', $yi[$i]->kode)->first()->alternatif,
                'preference_value' => $yi[$i]->minmax,
            ]);
        }

        return redirect()->route('result.index');
    }

    public function destroy()
    {
        Normalisasi::query()->truncate();
        Normalisasi2::query()->truncate();
        Normalisasi_Terbobot::query()->truncate();
        Yi::query()->truncate();
        Result::query()->truncate();
        return redirect()->route('result.index');
    }
}
