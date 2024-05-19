<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Matriks;
use App\Models\RocResult;
use Illuminate\Http\Request;

class RocController extends Controller
{
    public function sorting(Request $request) {
        $sort = $request->get('item');
        foreach($sort as $key => $value) {
            $k =Kriteria::where('id', $key)->first();
            $k->update(['urutan' => $value]);
        }

        return response()->json(['message' => 'Sukses']);
    }


  public function index()
  {
    $data = Kriteria::get();
    $dataResult = Kriteria::where('bobot', '!=', '0')->get();
    return view('pages.roc.index', compact('data', 'dataResult'));
  }

  public function hitung()
  {
    $kriteriaModel = Kriteria::orderBy('urutan', 'asc')->get();
    $totalKriteria = count($kriteriaModel);

    foreach ($kriteriaModel as $index => $kriteria) {
      $peringkat = $index + 1;
      $sumPeringkat = 0;
      for ($i = $peringkat; $i <= $totalKriteria; $i++) {
        $sumPeringkat += 1 / $i;
      }

      $bobot = round($sumPeringkat / $totalKriteria, 2);
      $kriteria->update(['bobot' => $bobot]);
    }
    return redirect()->back();
  }

  public function reset()
  {
    $data = Kriteria::get();
    foreach ($data as $item) {
      $item->update(['bobot' => 0]);
    }
    return redirect()->back();
  }
}
