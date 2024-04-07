<?php

namespace App\Http\Controllers\Promotions;

use App\Http\Controllers\Controller;
use App\Http\Requests\Promotions\StorePromoProRequest;
use App\Models\PromotionalProduct;
use App\Services\PromotionalService;
use Illuminate\Http\Request;

class PromotionalProductController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    //
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StorePromoProRequest $request)
  {
    $promo = PromotionalService::getPromotionalPro($request->promotion_id, $request->product_id);

    if ($promo->count()) {
      return back()->withErrors(['product_id' => 'El Producto ya está asignado!']);
    }

    PromotionalProduct::create(
      $request->safe()->all()
    );

    return to_route('promotions.show', $request->safe()->only('promotion_id')['promotion_id'])
      ->with('status', 'Producto asignado!');
  }

  /**
   * Display the specified resource.
   */
  public function show(PromotionalProduct $promotionalProduct)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(PromotionalProduct $promotionalProduct)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, PromotionalProduct $promotionalProduct)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(PromotionalProduct $promotionalProduct, Request $request)
  {
    $request->validate([
      'promotion_id' => ['required'],
    ]);

    $promotionalProduct->delete();

    return to_route('promotions.show', $request->promotion_id)
      ->with('status', 'Producto eliminado!');
  }
}
