<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Http\Requests\TagRequest;

class TagController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $tags = Tag::paginate(10);

    return view("tags.index", compact("tags"));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view("tags.create");
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(TagRequest $request)
  {
    $tag = Tag::create($request->all());

    return redirect()->route("tags.edit", $tag->id);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit($id)
  {
    $tag = Tag::where("id", $id)->first();

    return view("tags.edit", compact("tag"));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(TagRequest $request, $id)
  {
    $tag = Tag::where("id", $id)->first();

    $tag->update($request->all());

    return redirect()->route("tags.index");
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy($id)
  {
    $tag = Tag::where("id", $id)->first();
    $tag->delete();
    return redirect()->route("tags.index");
  }


  function posts($id)
  {
    $tag = Tag::where("id", $id)->first();
    $posts = $tag->post()->paginate(10);
    dd($posts);
    // retornamos la vista de los post que tiene ese tag
  }
}
