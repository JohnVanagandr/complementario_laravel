<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PublicController extends Controller
{
  function index()
  {
    $posts = Post::paginate(15);

    return view('index', compact('posts'));
  }
}
