<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $users = User::all();
    return view("users.index", compact("users"));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view("users.create");
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreUserRequest $request)
  {
    $user = User::create($request->all());

    return redirect()->route("users.edit", $user->id);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    $user = User::where("id", $id)->first();

    // dd($user->posts);

    return view("users.edit", compact("user"));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateUserRequest $request, string $id)
  {
    $user = User::where("id", $id)->first();
    $user->update($request->all());

    return redirect()->back();
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    $user = User::where("id", $id)->first();
    $user->delete();
    return redirect()->back();
  }

  function posts($id)
  {
    $user = User::where("id", $id)->first();
    $posts = $user->posts;
    return view("users.posts", compact("user", "posts"));
  }
}
