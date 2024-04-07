<?php

namespace App\Http\Controllers\Promotions;

use App\Http\Controllers\Controller;
use App\Http\Requests\Promotions\StoreAdvertisementRequest;
use App\Models\Advertisement;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdvertisementController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(): View
  {
    $promotions = Advertisement::with('promotion')->get();

    return view('advertisements.index', [
      'advertisements' => pagination($promotions),
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(): View
  {
    return view('advertisements.create', [
      'promotions' => Promotion::all(),
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreAdvertisementRequest $request)
  {
    Advertisement::create(
      $request->safe()->merge([
        'image' => $request->file('image')->store('/', 'advertisements'),
      ])
        ->all()
    );

    return to_route('advertisements.index')->with('status', 'Anuncio creado exitosamente!');
  }

  /**
   * Display the specified resource.
   */
  public function show(Advertisement $advertisement)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Advertisement $advertisement)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Advertisement $advertisement)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Advertisement $advertisement)
  {
    //
  }
}
