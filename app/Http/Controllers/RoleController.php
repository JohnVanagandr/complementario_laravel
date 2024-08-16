<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

  public function __construct()
  {
    $this->middleware('can:roles.index')->only('index');
    $this->middleware('can:roles.create')->only('create', 'store');
    $this->middleware('can:roles.edit')->only('edit', 'update');
    $this->middleware('can:roles.destroy')->only('destroy');
  }
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $roles = Role::paginate(10);
    return view('roles.index');
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
  public function store(Request $request)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
  }
}
