<?php

namespace App\Http\Controllers\Api\Shop;

use App\Enums\StockStatus;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ApiRecipesController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(Request $request)
  {
    $user = $request->user();

    return response()->json($user);
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
  public function show(User $user)
  {
    $user->recipes->each(function ($item) {

      $item->rawMaterials->each(function ($item) {
        $item->sale_price = round($item->price + $item->price * 0.16, 2);
        $item->stock = $item->stocks->filter(fn ($s) => $s->status == StockStatus::AVAILABLE->value);
        unset($item['stocks']);
        $item->stocks = $item->stock->count();
        $item->available = ($item->stocks - $item->min_stock) < 0 ? 0 : $item->stocks - $item->min_stock;

        $item->quantity_donut = intval($item->available / $item->amount_per_donut);
        unset($item['stock']);
      });

      $item->sale_price = $item->rawMaterials->reduce(fn ($carry, $value) => $carry + $value->sale_price, 0);
      $item->available = $item->rawMaterials->min('quantity_donut');
    });

    return response()->json(
      $user,
    );
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
