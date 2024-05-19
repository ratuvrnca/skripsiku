<?php

namespace App\Http\Controllers;

use App\Models\Matriks;
use App\Http\Requests\StoreMatriksRequest;
use App\Http\Requests\UpdateMatriksRequest;
use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\MatrikDetail;
use App\Models\Normalisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MatriksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        if ($user->role === "admin") {
            $data = Matriks::orderBy(DB::raw('length(kode)'), 'asc')->orderBy('kode', 'asc')->get();
        } else {
            $data = Matriks::where('user_id', $user->id)->get();
        }

        $ratarata = Matriks::uniqueMatrix();

        $kriterias = Kriteria::all();

        return view('pages.matriks.index', compact('data', 'kriterias', 'ratarata'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();
        $alternatifs = Alternatif::whereNotIn('kode', Matriks::where('user_id', $user->id)->select('kode'))->get();
        $kriterias = Kriteria::all();
        return view('pages.matriks.create', compact('kriterias', 'alternatifs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->request->add(['user_id' => auth()->user()->id]);
        DB::beginTransaction();
        $matrik = Matriks::create($request->only('kode', 'user_id'));
        $kriterias = Kriteria::all();
        $inputKriteria = $request->get('kriteria');
        foreach ($kriterias as $kriteria) {
            MatrikDetail::create(['matrik_id' => $matrik->id, 'kriteria_id' => $kriteria->id, 'nilai' => $inputKriteria[$kriteria->id]]);
        }

        DB::commit();
        return redirect()->route('matriks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Matriks $matriks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $matriks = Matriks::find($id);
        $user = auth()->user();
        $alternatifs = Alternatif::whereNotIn('kode', Matriks::where('user_id', $user->id)->where('id', '!=', $id)->select('kode'))->get();
        $kriterias = Kriteria::all();
        return view('pages.matriks.edit', compact('matriks', 'alternatifs', 'kriterias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        $matrik = Matriks::find($id);
        DB::beginTransaction();
        $matrik->update($request->only('kode'));
        $kriterias = Kriteria::all();
        $inputKriteria = $request->get('kriteria');
        MatrikDetail::where(['matrik_id' => $matrik->id])->delete();
        foreach ($kriterias as $kriteria) {
            MatrikDetail::create(['matrik_id' => $matrik->id, 'kriteria_id' => $kriteria->id, 'nilai' => $inputKriteria[$kriteria->id]]);
        }

        DB::commit();
        return redirect()->route('matriks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $matrik = Matriks::find($id);
        MatrikDetail::where(['matrik_id' => $matrik->id])->delete();
        $matrik->delete();
        return redirect()->route('matriks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyAll()
    {
        MatrikDetail::truncate();
        Matriks::where(DB::raw(1), '=', 1)->delete();
        return redirect()->route('matriks.index');
    }
}
