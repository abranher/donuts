<?php

namespace App\Http\Controllers\Api\ProductValoration;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductValorations\StoreProValRequest;
use App\Models\Product;
use App\Models\ProductValoration;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductValorationController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(Product $product)
  {
    return success('Valoraciones de Productos', $product->productValorations->each(function ($valoration) {
      $valoration->user->getPictureUrlUserAttribute();
      $valoration->created = Carbon::parse($valoration->created_at)->format('d/m/Y');
      $valoration->productValorationLikes;
    }));
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
  public function store(StoreProValRequest $request)
  {
    $result = ProductValoration::where('user_id', $request->safe(['user_id']))
      ->where('product_id', $request->safe(['product_id']))
      ->first();

    if ($result != null) {
      return error('Ya has comentado este producto!');
    }

    ProductValoration::create($request->safe()->all());

    return success("Registro exitoso!");
  }

  /**
   * Display the specified resource.
   */
  public function show(ProductValoration $productValoration)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(ProductValoration $productValoration)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, ProductValoration $productValoration)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(ProductValoration $productValoration)
  {
    //
  }
}
