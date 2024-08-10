<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Image;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $posts = Post::paginate(4);
    return view("posts.index", compact("posts"));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $users = User::pluck('name', "id");
    $Category = Category::pluck("name", "id");
    $tags = Tag::all();
    return view("posts.create", compact("users", "Category", "tags"));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(PostRequest $request)
  {
    // Creamos el post y retornamos el modelo
    $post = Post::create($request->all());
    $archivos = $request->file;
    $data = [];
    foreach ($archivos as $archivo) {
      // Creamos la imagen y retornamos el modelo
      $img = Image::create([
        'name' => $archivo->getClientOriginalName(),
        'path' => $archivo->store('/', 'post')
      ]);
      // Push del id del modelo miren bien
      array_push($data, $img->id);
    }
    // Relacionamos el post con la imagenes
    $post->images()->sync($data);

    $post->tags()->sync($request->tag_id);

    return redirect()->route("posts.index");
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    $users = User::pluck('name', "id");
    $Category = Category::pluck("name", "id");
    $post = Post::where("id", $id)->first();

    return view("posts.edit", compact("users", "post", "Category"));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(PostRequest $request, string $id)
  {
    $post = Post::where("id", $id)->first();

    $post = $post->update($request->all());

    return redirect()->route("posts.index");
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    $post = Post::where("id", $id)->first();
    $post->tags()->detach();
    $post->delete();
    return redirect()->route("posts.index");
  }
}
