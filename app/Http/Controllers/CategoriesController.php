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
    $categories = Category::paginate(10);
    return view("category.index", compact("categories"));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view("category.create");
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(CategoryRequest $request)
  {
    $category = Category::create($request->all());

    return redirect()->route("categories.edit", $category->id);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit($id)
  {
    $category = Category::where("id", $id)->first();

    return view("category.edit", compact("category"));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(CategoryRequest $request, $id)
  {
    $category = Category::where("id", $id)->first();

    $category->update($request->all());

    return redirect()->route("categories.index");
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy($id)
  {
    $category = Category::where("id", $id)->first();
    $category->delete();
    return redirect()->route("categories.index");
  }
}
