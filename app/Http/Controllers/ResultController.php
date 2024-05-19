<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Http\Requests\StoreResultRequest;
use App\Http\Requests\UpdateResultRequest;
use App\Models\Kriteria;
use App\Models\Matriks;
use App\Models\MatriksAPB;
use App\Models\MatriksJA;
use App\Models\Normalisasi;
use App\Models\Normalisasi2;
use App\Models\Normalisasi3;
use App\Models\Normalisasi_Terbobot;
use App\Models\Yi;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kriterias = Kriteria::all();
        $matriks = Matriks::uniqueMatrix();
        $normalisasi = Normalisasi::orderBy('id', 'ASC')->get()->pluck('nilai', 'kriteria_id')->toArray();

        $normalisasi_step2 = Normalisasi2::orderBy('id', 'ASC')->get();
        $normalisasi2 = [];
        foreach ($normalisasi_step2 as $item) {
            if (!isset($normalisasi2[$item->kode])) $normalisasi2[$item->kode] = [];
            $normalisasi2[$item->kode][$item->kriteria] = $item->nilai;
        }
        // dd($normalisasi2);

        $normalisasi_stepterbobot = Normalisasi_Terbobot::orderBy('id', 'ASC')->get();

        $normalisasi_terbobot = [];
        foreach ($normalisasi_stepterbobot as $item) {
            if (!isset($normalisasi_terbobot[$item->kode])) $normalisasi_terbobot[$item->kode] = [];
            $normalisasi_terbobot[$item->kode][$item->kriteria] = $item->nilai;
        }

        $yi = Yi::
        orderBy(\Illuminate\Support\Facades\DB::raw('length(kode)'), 'asc')
        ->orderBy('kode', 'asc')->get();
        $result = Result::orderBy('preference_value', 'DESC')->get();
        return view('pages.result.index', compact('matriks', 'kriterias', 'result', 'normalisasi', 'normalisasi2', 'normalisasi_terbobot', 'yi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreResultRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Result $result)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Result $result)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateResultRequest $request, Result $result)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Result $result)
    {
        //
    }
}
