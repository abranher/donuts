<?php

namespace App\Http\Controllers\Promotions;

use App\Http\Controllers\Controller;
use App\Http\Requests\Promotions\StorePromotionRequest;
use App\Http\Requests\Promotions\UpdatePromotionRequest;
use App\Models\CategoryProduct;
use App\Models\Product;
use App\Models\Promotion;
use App\Services\PromotionService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PromotionController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(): View
  {
    return view('promotions.index', [
      'promotions' => Promotion::pag(),
      'promosForCalendar' => Promotion::all()->map(
        fn ($item) => [
          'id' => $item->id,
          'title' => $item->title,
          'start' => $item->start_date,
          'end' => $item->end_date,
        ]
      ),
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(): View
  {
    return view('promotions.create', [
      'promotion' => PromotionService::getLatest(),
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StorePromotionRequest $request): RedirectResponse
  {
    Promotion::create(
      $request->safe()
        ->merge(['discount' => $request->discount / 100])
        ->all()
    );

    return to_route('promotions.index')->with('status', 'Promoción creada exitosamente!');
  }

  /**
   * Display the specified resource.
   */
  public function show(Promotion $promotion): View
  {
    $promotion->promotionalProducts->each(function ($item) {
      $item->product;
    });

    $promotion->promotionalCatProducts->each(function ($item) {
      $item->categoryProduct;
    });

    return view('promotions.show', [
      'promotion' => $promotion,
      'products' => Product::with('promotionalProducts')->get(),
      'categories' => CategoryProduct::with('promotionalCatProducts')->get(),
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Promotion $promotion): View
  {
    $promotion->discount = $promotion->discount * 100;

    return view('promotions.edit', [
      'promotion' => $promotion,
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdatePromotionRequest $request, Promotion $promotion): RedirectResponse
  {
    $promotion->update(
      $request->safe()
        ->merge(['discount' => $request->discount / 100])
        ->all()
    );

    return to_route('promotions.index')->with('status', 'Promoción actualizada exitosamente!');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Promotion $promotion): RedirectResponse
  {
    $promotion->delete();

    return to_route('promotions.index')->with('status', 'Promoción eliminada exitosamente!');
  }
}
