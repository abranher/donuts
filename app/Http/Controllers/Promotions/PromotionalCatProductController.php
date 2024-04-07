<?php

namespace App\Http\Controllers\Promotions;

use App\Http\Controllers\Controller;
use App\Http\Requests\Promotions\StorePromoCatProRequest;
use App\Models\PromotionalCatProduct;
use App\Services\PromotionalService;
use Illuminate\Http\Request;

class PromotionalCatProductController extends Controller
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
  public function store(StorePromoCatProRequest $request)
  {
    $promo = PromotionalService::getPromotionalCat($request->promotion_id, $request->category_product_id);

    if ($promo->count()) {
      return back()->withErrors(['category_product_id' => 'La Categoría ya está asignada!']);
    }

    PromotionalCatProduct::create(
      $request->safe()->all()
    );

    return to_route('promotions.show', $request->safe()->only('promotion_id')['promotion_id'])
      ->with('status', 'Categoría asignada!');
  }

  /**
   * Display the specified resource.
   */
  public function show(PromotionalCatProduct $promotionalCatProduct)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(PromotionalCatProduct $promotionalCatProduct)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, PromotionalCatProduct $promotionalCatProduct)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(PromotionalCatProduct $promotionalCatProduct, Request $request)
  {
    $request->validate([
      'promotion_id' => ['required'],
    ]);

    $promotionalCatProduct->delete();

    return to_route('promotions.show', $request->promotion_id)
      ->with('status', 'Categoría eliminada!');
  }
}
