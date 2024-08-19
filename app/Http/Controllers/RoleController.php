<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
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
    return view('roles.index', compact('roles'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $permissions = Permission::all();
    return view('roles.create', compact('permissions'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $role = Role::create(
      ['name' => $request->name]
    );

    $role->permissions()->sync($request->permissions);
    return redirect()->route("roles.index");
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Role $role)
  {
    $permissions_role = $role->permissions;
    $permissions = Permission::all();
    return view('roles.edit', compact('role', 'permissions', 'permissions_role'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Role $role)
  {
    $role->update($request->all());
    $role->permissions()->sync($request->permissions);
    return redirect()->route("roles.index");
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Role $role)
  {
    $role->permissions()->detach();
    $role->delete();
    return redirect()->route("roles.index");
  }
}
