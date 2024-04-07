<?php

namespace App\Http\Controllers\Api\MasterRegisters;

use App\Http\Controllers\Controller;
use App\Http\Requests\MasterRegisters\Api\StoreStockRawRequest;
use App\Models\RawMaterial;
use App\Models\StockRawMaterial;
use App\Services\CodeService;
use Illuminate\Http\Request;

class StockRawMaterialController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return response()->json(
      RawMaterial::all()
    );
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreStockRawRequest $request)
  {
    $now = now();
    $code = CodeService::getCode('stock_raw_materials');

    foreach ($request->safe()->all() as $item) {
      $StockRawMaterial = [];
      for ($i = 0; $i < $item['quantity']; $i++) {
        $StockRawMaterial[$i] = [
          'code' => $code,
          'raw_material_id' => $item['raw_material_id'],
          'expires_at' => $item['expires_at'],
          'created_at' => $now,
          'updated_at' => $now,
        ];
      }
      StockRawMaterial::insert($StockRawMaterial);
    }

    return success('Registro exitoso!');
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
  }
}
