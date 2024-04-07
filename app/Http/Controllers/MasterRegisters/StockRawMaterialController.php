<?php

namespace App\Http\Controllers\MasterRegisters;

use App\Http\Controllers\Controller;
use App\Models\RawMaterial;
use App\Models\StockRawMaterial;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StockRawMaterialController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(): View
  {
    $raw_materials = RawMaterial::getStocks();

    return view('inventory.stock-raw-materials.index', [
      'raw_materials' => pagination($raw_materials),
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(): View
  {
    return view('inventory.stock-raw-materials.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   */
  public function show(RawMaterial $stock_raw_material): View
  {
    $stock_raw_material->num_stocks = $stock_raw_material->stocks->groupBy('created_at')->each(function ($item) {
      $item->stocks = $item->count();
    });

    return view('inventory.stock-raw-materials.show', [
      'raw_material' => $stock_raw_material,
      'stock_raw_material' => pagination($stock_raw_material->num_stocks),
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(StockRawMaterial $stockRawMaterial)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, StockRawMaterial $stockRawMaterial)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(StockRawMaterial $stockRawMaterial)
  {
    //
  }
}
