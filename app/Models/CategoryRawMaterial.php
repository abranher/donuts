<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CategoryRawMaterial extends Model
{
  use HasFactory;

  protected $fillable = [
    'code',
    'name',
  ];

  /**
   * Get all of the rawMaterials for the CategoryRawMaterial
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function rawMaterials(): HasMany
  {
    return $this->hasMany(RawMaterial::class);
  }
}
