<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Http\Requests\StoreAlternatifRequest;
use App\Http\Requests\UpdateAlternatifRequest;
use App\Models\AlternatifType;
use App\Models\MatrikDetail;
use App\Models\Matriks;
use App\Models\Normalisasi;
use App\Models\Normalisasi2;
use App\Models\Normalisasi_Terbobot;
use App\Models\Result;
use App\Models\Yi;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $data = Alternatif::where(function ($builder) use ($keyword) {
            $builder->where('alternatif', 'like', "%$keyword%")
                ->orWhere('kode', 'like', "%$keyword%");
        })->orderBy('id', 'ASC')->get();
        return view('pages.alternatif.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.alternatif.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAlternatifRequest $request)
    {
        $data = $request->validated();
        try {
            DB::beginTransaction();
            Alternatif::create($data);
            DB::commit();
            return redirect()->route('alternatif.index')->with('success', 'create user successfully');
        } catch (Exception $exception) {
            DB::rollBack();
            return redirect()->route('alternatif.index')->with('error', 'user failed to create');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Alternatif $alternatif)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Alternatif::find($id);
        return view('pages.alternatif.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAlternatifRequest $request, $id)
    {
        $alternatif = Alternatif::find($id);
        $alternatif->update($request->validated());
        return redirect()->route('alternatif.index');
    }


    /**
     * Update the specified resource in storage.
     */
    public function import(Request $request)
    {
        $file = $request->has('file');
        if (!$file) {
            return redirect()->route('alternatif.index')->with('error', 'File tidak boleh kosong');
        }
        $file = $request->file('file');

        $realpath = $file->getRealPath();

        try {
            DB::beginTransaction();


            Normalisasi::where(DB::raw(1), 1)->delete();
            Normalisasi2::where(DB::raw(1), 1)->delete();
            Normalisasi_Terbobot::where(DB::raw(1), 1)->delete();
            Yi::where(DB::raw(1), 1)->delete();
            Result::where(DB::raw(1), 1)->delete();
            MatrikDetail::where(DB::raw(1), 1)->delete();
            Matriks::where(DB::raw(1), 1)->delete();
            Alternatif::where(DB::raw(1), 1)->delete();

            $handle = fopen($realpath, "r");
            $line = 0;
            while (($data = fgetcsv($handle, 0, ";")) !== FALSE) {
                if ($line == 0) {
                    $line++;
                    continue;
                }

                Alternatif::create([
                    'kode' => $data[0],
                    'alternatif' => $data[1],
                ]);

                $line++;
            }

            DB::commit();
            return redirect()->route('alternatif.index')->with('success', 'berhasil');
        } catch (\Throwable $th) {
            DB::rollBack();

            dd($th);
            return redirect()->route('alternatif.index')->with('error', 'Gagal mengimport data');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Alternatif::destroy($id);
        return redirect()->route('alternatif.index');
    }
}
