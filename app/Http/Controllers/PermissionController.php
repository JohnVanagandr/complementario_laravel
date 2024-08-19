<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware('can:permissions.index')->only('index');
    $this->middleware('can:permissions.create')->only('create', 'store');
    $this->middleware('can:permissions.edit')->only('edit', 'update');
    $this->middleware('can:permissions.destroy')->only('destroy');
  }
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $permissions = Permission::paginate(10);
    return view('permissions.index', compact('permissions'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('permissions.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    Permission::create($request->all());
    return redirect()->route("permissions.index");
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Permission $permission)
  {
    return view('permissions.edit', compact('permission'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Permission $permission)
  {
    $permission->update($request->all());
    return redirect()->route("permissions.index");
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Permission $permission)
  {
    $permission->delete();
    return redirect()->route("permissions.index");
  }
}
