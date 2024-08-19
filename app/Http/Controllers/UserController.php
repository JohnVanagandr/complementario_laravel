<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware('can:users.index')->only('index');
    $this->middleware('can:users.edit')->only('edit', 'update');
    $this->middleware('can:users.destroy')->only('destroy');
  }
  /**
   * Display a listing of the resource.
   */
  public function index(Request $request)
  {
    $users = User::whereHas('roles', function ($query) {
      return  $query->where('name', '!=', 'Super-Admin')
        ->where('id', '!=', Auth()->user()->id);
    });

    if ($request->name) {
      $users = $users->where('name', 'LIKE', '%' . $request->name . '%');
    }

    $users = $users->paginate();

    return view("users.index", compact("users"));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(User $user)
  {
    $roles_user = $user->getRoleNames();
    $roles = Role::all()->pluck('name', 'name');
    return view("users.edit", compact("user", 'roles', 'roles_user'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UserRequest $request, User $user)
  {
    // $user->update($request->all());

    $user->syncRoles($request->role);

    return redirect()->route("users.index");
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(User $user)
  {
    foreach ($user->posts as $post) {
      $post->tags()->detach();
      // Recorremos todos los posts del usuario
      foreach ($post->images as $imagen) {
        // Eliminamos del disco la imagen
        Storage::disk("post")->delete($imagen->path);
        // Eliminamos el modelo
        $imagen->delete();
      }
      // Eliminamos el posts
      $post->delete();
    }
    // Eliminamos el usuario
    $user->delete();
    // Redirigimos al usuario a la vista anterior
    return redirect()->back();
  }

  function posts($id)
  {
    $user = User::where("id", $id)->first();
    $posts = $user->posts;
    return view("users.posts", compact("user", "posts"));
  }
}
