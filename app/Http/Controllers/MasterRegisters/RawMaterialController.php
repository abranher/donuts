<?php

namespace App\Http\Controllers\MasterRegisters;

use App\Http\Controllers\Controller;
use App\Models\RawMaterial;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RawMaterialController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(): View
  {
    return view('inventory.raw-materials.index', [
      'raw_materials' => RawMaterial::with('categoryRawMaterial')->paginate(5),
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
  }

  /**
   * Display the specified resource.
   */
  public function show(RawMaterial $raw_material)
  {
    return response()->json(['status' => true, 'data' => $raw_material]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, RawMaterial $raw_material)
  {
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(RawMaterial $raw_material)
  {
    $raw_material->delete();
    return response()->json([
      'status' => true,
      'type' => 'success',
      'message' => 'Materia prima eliminada exitosamente!'
    ], 200);
  }
}
