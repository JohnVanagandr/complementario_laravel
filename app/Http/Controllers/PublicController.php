<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PublicController extends Controller
{
  function index()
  {
    // Listamos los posts de todos los usuarios
    $posts = Post::paginate(15);
    // Listamos las categorias
    $categories = Category::all();

    return view('index', compact('posts', 'categories'));
  }
}
