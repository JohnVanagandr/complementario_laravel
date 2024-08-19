<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CategoryRequest;

class CategoriesController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware('can:categories.index')->only('index');
    $this->middleware('can:categories.create')->only('create', 'store');
    $this->middleware('can:categories.edit')->only('edit', 'update');
    $this->middleware('can:categories.destroy')->only('destroy');
  }
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

    return redirect()->route("categories.index");
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Category $category)
  {
    return view("category.edit", compact("category"));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(CategoryRequest $request, Category $category)
  {
    $category->update($request->all());
    return redirect()->route("categories.index");
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Category $category)
  {
    $category->delete();
    return redirect()->route("categories.index");
  }
}
