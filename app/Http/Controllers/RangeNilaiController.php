<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rangenilai;
use App\Http\Requests\StoreRangeNilaiRequest;
use App\Http\Requests\UpdateRangeNilaiRequest;
use Exception;
use Illuminate\Support\Facades\DB;

class RangeNilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Rangenilai::orderBy('id', 'ASC')->get();
        return view('pages.rangenilai.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.rangenilai.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRangeNilaiRequest $request)
    {
        $data = $request->validated();
        try {
            DB::beginTransaction();
            Rangenilai::create($data);
            DB::commit();
            return redirect()->route('rangenilai.index')->with('success', 'create user successfully');
        } catch (Exception $exception) {
            DB::rollBack();
            return redirect()->route('rangenilai.index')->with('error', 'user failed to create');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(RangeNilai $rangenilai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Rangenilai::find($id);
        return view('pages.rangenilai.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRangeNilaiRequest $request, $id)
    {
        $rangenilai = Rangenilai::find($id);
        $rangenilai->update($request->validated());
        return redirect()->route('rangenilai.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        RangeNilai::destroy($id);
        return redirect()->route('rangenilai.index');
    }
}
