<?php

namespace App\Http\Controllers\CustomDonut;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomDonut\StoreRecipeRequest;
use App\Models\RawMaterial;
use App\Models\Recipe;
use App\Models\RecipeDescription;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(Request $request)
  {
    return view('custom.index', [
      'recipes' => $request->user()->recipes->each(function ($item) {
        $item->rawMaterials;
        $item->created = Carbon::parse($item->created_at)->diffForHumans();
        $item->created_in = Carbon::parse($item->created_at)->format('d-m-Y');
      }),
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('custom.create', [
      'raw_materials' => RawMaterial::getAll(),
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreRecipeRequest $request)
  {
    $recipe = Recipe::create(
      $request->safe()
        ->merge(['user_id' => $request->user()->id])
        ->only(['name', 'description', 'user_id'])
    );

    RecipeDescription::create([
      'recipe_id' => $recipe->id,
      'raw_material_id' => 1,
    ]);

    RecipeDescription::create(
      $request->safe()
        ->merge(['recipe_id' => $recipe->id, 'raw_material_id' => $request->glazed])
        ->only(['recipe_id', 'raw_material_id'])
    );

    RecipeDescription::create(
      $request->safe()
        ->merge(['recipe_id' => $recipe->id, 'raw_material_id' => $request->topping])
        ->only(['recipe_id', 'raw_material_id'])
    );

    return to_route('recipes.index')
      ->with('status', 'Receta registrada exitosamente!');
  }

  /**
   * Display the specified resource.
   */
  public function show(Recipe $recipe)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Recipe $recipe)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Recipe $recipe)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Recipe $recipe)
  {
    //
  }
}
