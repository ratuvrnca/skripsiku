<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Http\Requests\StoreKriteriaRequest;
use App\Http\Requests\UpdateKriteriaRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $data = Kriteria::where('kriteria', 'like', "%$keyword%")->get();
        return view('pages.kriteria.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Kriteria::all();
        return view('pages.kriteria.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKriteriaRequest $request)
    {
        $data = $request->validated();
        try {
            DB::beginTransaction();
            Kriteria::create(array_merge($data, ['urutan' => Kriteria::count()]));
            DB::commit();
            return redirect()->route('kriteria.index')->with('success', 'create kriteria successfully');
        } catch (Exception $exception) {
            DB::rollBack();
            return redirect()->back()->withInput($request->all())->with('error', 'kriteria failed to create :' . $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Kriteria $kriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Kriteria::find($id);
        return view('pages.kriteria.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKriteriaRequest $request, $id)
    {
        $data = Kriteria::find($id);
        $data->update($request->validated());
        return redirect()->route('kriteria.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Kriteria::destroy($id);
        return redirect()->route('kriteria.index');
    }
}
