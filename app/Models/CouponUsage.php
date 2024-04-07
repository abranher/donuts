<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CouponUsage extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'coupon_id',
    'user_id',
  ];

  /**
   * Get the coupon that owns the CouponUsage
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function coupon(): BelongsTo
  {
    return $this->belongsTo(Coupon::class);
  }
}
