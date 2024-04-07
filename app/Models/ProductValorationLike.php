<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductValorationLike extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'product_valoration_id',
    'user_id',
  ];

  /**
   * Get the user that owns the ProductValorationLike
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function user(): BelongsTo
  {
    return $this->belongsTo(User::class);
  }

  /**
   * Get the productValoration that owns the ProductValorationLike
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function productValoration(): BelongsTo
  {
    return $this->belongsTo(ProductValoration::class);
  }
}
