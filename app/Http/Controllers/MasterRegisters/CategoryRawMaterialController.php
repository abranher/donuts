<?php

namespace App\Http\Controllers\MasterRegisters;

use App\Http\Controllers\Controller;
use App\Models\CategoryRawMaterial;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryRawMaterialController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(): View
  {
    return view('inventory.category-raw-materials.index', [
      'categories' => CategoryRawMaterial::all(),
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    dd($request);
  }

  /**
   * Display the specified resource.
   */
  public function show(CategoryRawMaterial $category_raw_material)
  {
    return response()->json(['status' => true, 'data' => $category_raw_material]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, CategoryRawMaterial $category_raw_material)
  {
    dd($request);
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(CategoryRawMaterial $category_raw_material)
  {
    $category_raw_material->delete();
  }
}
