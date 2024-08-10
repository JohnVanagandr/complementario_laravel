<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CategoryRequest;

class CategoriesController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $Category = Category::paginate(10);
    return view("Category.index", compact("Category"));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view("Category.create");
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(CategoryRequest $request)
  {
    $category = Category::create($request->all());

    return redirect()->route("Category.edit", $category->id);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit($id)
  {
    $category = Category::where("id", $id)->first();

    return view("Category.edit", compact("category"));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(CategoryRequest $request, $id)
  {
    $category = Category::where("id", $id)->first();

    $category->update($request->all());

    return redirect()->route("Category.index");
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy($id)
  {
    $category = Category::where("id", $id)->first();
    $category->delete();
    return redirect()->route("Category.index");
  }
}
