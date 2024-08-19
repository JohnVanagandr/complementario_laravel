<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use App\Services\FileService;
use App\Services\PostService;

class PostController extends Controller
{
  protected $postService;
  protected $fileService;

  public function __construct(
    PostService $postService,
    FileService $fileService
  ) {
    $this->fileService = $fileService;
    $this->postService = $postService;
    // Iniciamos todas la validaciones de la clase y las asignamos al método o métodos
    $this->middleware('auth');
    $this->middleware('can:posts.index')->only('index');
    $this->middleware('can:posts.create')->only('create', 'store');
    $this->middleware('can:posts.edit')->only('edit', 'update');
    $this->middleware('can:posts.destroy')->only('destroy');
  }

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $posts = $this->postService->list();
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
    try {
      // Llamamos el servicio para crear el post
      $this->postService->store($request);
      // Redireccionamos al usuario a la lista de todos los post
      return redirect()->route("posts.index");
    } catch (\Exception $e) {
      dd($e);
    }
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Post $post)
  {
    $this->authorize('view', $post);
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
  public function update(PostRequest $request, Post $post)
  {
    try {
      // Llamamos al servcio para actualizar el post
      $this->postService->update($request, $post);
      // Redireccionamos a la ruta index
      return redirect()->route("posts.index");
    } catch (\Exception $e) {
      // Si quremos ver los errores, pero es importante no dejarlo en producción
      dd($e);
    }
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Post $post)
  {
    // Llamamos el servicio para eliminara el posr
    $this->postService->delete($post);

    return redirect()->route("posts.index");
  }
}
