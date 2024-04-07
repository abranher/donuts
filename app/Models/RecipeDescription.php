<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RecipeDescription extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'recipe_id',
    'raw_material_id',
  ];

  /**
   * Get the recipe that owns the RecipeDescription
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function recipe(): BelongsTo
  {
    return $this->belongsTo(Recipe::class);
  }

  /**
   * Get the rawMaterial that owns the RecipeDescription
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function rawMaterial(): BelongsTo
  {
    return $this->belongsTo(RawMaterial::class);
  }
}
