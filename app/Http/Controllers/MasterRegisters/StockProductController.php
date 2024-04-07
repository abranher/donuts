<?php

namespace App\Http\Controllers\MasterRegisters;

use App\Enums\StockStatus;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\StockProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class StockProductController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(): View
  {
    $products = Product::getStocks();

    return view('inventory.stock-products.index', [
      'products' => pagination($products),
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(): View
  {
    return view('inventory.stock-products.create');
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
  public function show(Product $stock_product): View
  {
    $stock_product->num_stocks = $stock_product->stocks->groupBy('created_at')->each(function ($item) {
      $item->stocks = $item->count();
      $item->code = $item->map(function ($item) {
        return $item->code;
      })->first();
    });

    return view('inventory.stock-products.show', [
      'product' => $stock_product,
      'stock_product' => pagination($stock_product->num_stocks),
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(StockProduct $stock_product)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, StockProduct $stock_product)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(StockProduct $stock_product)
  {
    //
  }
}
