<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $data = User::orderBy('name', 'ASC')->get();
    return view('pages.user.index', compact('data'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('pages.user.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreUserRequest $request)
  {
    $data = $request->validated();
    $data['role'] = 'user';
    $data['password'] = bcrypt($data['password']);
    try {
      DB::beginTransaction();
      User::create($data);
      DB::commit();
      return redirect()->route('user.index')->with('success', 'create kriteria successfully');
    } catch (Exception $exception) {
      DB::rollBack();
      return redirect()->back()->withInput($request->all())->with('error', 'kriteria failed to create :' . $exception->getMessage());
    }
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit($id)
  {
    $data = User::find($id);
    return view('pages.user.edit', compact('data'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateUserRequest $request, $id)
  {
    $data = User::find($id);
    $payload = $request->validated();

    if (isset($payload['password']))
      $payload['password'] = bcrypt($payload['password']);
    else unset($payload['password']);
    $data->update($payload);
    return redirect()->route('user.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy($id)
  {
    if ($id == 1) return redirect()->route('user.index')->with('error', 'User Admin tidak dapat di hapus');
    User::destroy($id);
    return redirect()->route('user.index');
  }
}
