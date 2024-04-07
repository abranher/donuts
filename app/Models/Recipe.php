<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Recipe extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'name',
    'description',
    'user_id',
  ];

  /**
   * Get the user that owns the Recipe
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function user(): BelongsTo
  {
    return $this->belongsTo(User::class);
  }

  /**
   * The rawMaterials that belong to the Recipe
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
   */
  public function rawMaterials(): BelongsToMany
  {
    return $this->belongsToMany(RawMaterial::class, 'recipe_descriptions');
  }

  /**
   * Get all of the recipeDescriptions for the Recipe
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function recipeDescriptions(): HasMany
  {
    return $this->hasMany(RecipeDescription::class);
  }
}
