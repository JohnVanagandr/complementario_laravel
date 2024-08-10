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
    $categories = Category::pluck("name", "id");
    $tags = Tag::all();
    return view("posts.create", compact("users", "categories", "tags"));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(PostRequest $request)
  {
    // Creamos el post y retornamos el modelo
    $post = Post::create($request->all());
    $post->tags()->sync($request->tag_id);
    $archivos = $request->file;
    foreach ($archivos as $archivo) {
      // Creamos la imagen y retornamos el modelo
      Image::create([
        'name' => $archivo->getClientOriginalName(),
        'path' => $archivo->store('/', 'post'),
        'post_id' => $post->id
      ]);
    }
    return redirect()->route("posts.index");
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    // Consultamos el post por el id
    $post = Post::where("id", $id)->first();
    // Pasamos los tags a un arreglo
    $users = User::pluck('name', "id");
    // Pasamos las categorias a un arreglo
    $categories = Category::pluck("name", "id");
    // Listamos todos los tags
    $tags = Tag::all();
    // Listamos todos los tags relacionados al post
    $post_tags = $post->tags;
    return view("posts.edit", compact("users", "categories", "tags", "post", "post_tags"));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(PostRequest $request, string $id)
  {
    try {
      $post = Post::where("id", $id)->first();
      // Actualizamos los datos del post
      $post->update($request->all());
      // Actualizamos los tags relacionados al post
      $post->tags()->sync($request->tag_id);
      // Preguntamos si la solicitud tiene imagenes asociadas.
      if ($request->file('file')) {
        // preguntamos si el modelo tiene alguna imagen relacionada
        // Si tiene imagenes, las borramos y acutualizamos el registro con las nuevas imagenes
        if ($post->images) {
          // Recorremos las imagenes que tiene el post y eliminamos una a una
          foreach ($post->images as $imagen) {
            // Eliminamos del disco la imagen
            Storage::disk("post")->delete($imagen->path);
            // Eliminamos el modelo
            $imagen->delete();
          }
          // Recorremos los archivos que llegan en la petición y creamos los nuevos registros
          // Este codigo se repite y ya inicia a ser importante trabajar con algun patrón de diseño
          foreach ($request->file as $archivo) {
            // Creamos la imagen y retornamos el modelo
            Image::create([
              'name' => $archivo->getClientOriginalName(),
              'path' => $archivo->store('/', 'post'),
              'post_id' => $post->id
            ]);
          }
        } else {
          // Como el post no tiene imagenes, le asignamos las imagenes que llegan en la solicitud
          // Recorremos los archivos que llegan en la petición y creamos los nuevos registros
          // Este codigo se repite y ya inicia a ser importante trabajar con algun patrón de diseño
          foreach ($request->file as $archivo) {
            // Creamos la imagen y retornamos el modelo
            Image::create([
              'name' => $archivo->getClientOriginalName(),
              'path' => $archivo->store('/', 'post'),
              'post_id' => $post->id
            ]);
          }
        }
      }
      return redirect()->route("posts.index");
    } catch (\Exception $e) {
      // Si quremos ver los errores, pero es importante no dejarlo en producción
      dd($e);
    }
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    // Consultamos el Modelo
    $post = Post::where("id", $id)->first();
    // Eliminamos la relación de los tags
    $post->tags()->detach();
    // Recorremos las imagenes relacionadas al post
    foreach ($post->images as $imagen) {
      // Eliminamos del disco la imagen
      Storage::disk("post")->delete($imagen->path);
      // Eliminamos el modelo
      $imagen->delete();
    }
    // Eliminamos el post
    $post->delete();
    return redirect()->route("posts.index");
  }
}
