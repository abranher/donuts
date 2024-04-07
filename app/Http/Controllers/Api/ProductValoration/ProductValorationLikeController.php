<?php

namespace App\Http\Controllers\Api\ProductValoration;

use App\Http\Controllers\Controller;
use App\Models\ProductValoration;
use App\Models\ProductValorationLike;
use App\Models\User;
use Illuminate\Http\Request;

class ProductValorationLikeController extends Controller
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
  public function store(Request $request, ProductValoration $productValoration, User $user)
  {
    $searchlike = ProductValorationLike::where('product_valoration_id', $productValoration->id)
      ->where('user_id', $user->id)
      ->first();

    if ($request->action == 'create' && $searchlike == null) {
      $like = ProductValorationLike::create([
        'product_valoration_id' => $productValoration->id,
        'user_id' => $user->id,
      ]);

      return success("create", $like);
    } elseif ($request->action == 'delete' && $searchlike != null) {
      $searchlike->delete();

      return success("delete");
    }
  }

  /**
   * Display the specified resource.
   */
  public function show(ProductValoration $productValoration, User $user)
  {
    $like = ProductValorationLike::where('product_valoration_id', $productValoration->id)
      ->where('user_id', $user->id)
      ->first();

    if ($like == null) {
      return error('No tiene like!');
    }

    return success("Si tiene like!", $like);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(ProductValorationLike $productValorationLike)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, ProductValorationLike $productValorationLike)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(ProductValorationLike $productValorationLike)
  {
    //
  }
}
