<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductValoration extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'product_id',
    'user_id',
    'valoration',
    'comment',
  ];

  /**
   * Get the user that owns the ProductValoration
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function user(): BelongsTo
  {
    return $this->belongsTo(User::class);
  }

  /**
   * Get the product that owns the ProductValorationLike
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function product(): BelongsTo
  {
    return $this->belongsTo(Product::class);
  }

  /**
   * Get all of the productValorationLikes for the ProductValoration
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function productValorationLikes(): HasMany
  {
    return $this->hasMany(ProductValorationLike::class);
  }
}
