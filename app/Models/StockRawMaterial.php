<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StockRawMaterial extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'code',
    'raw_material_id',
    'expires_at',
    'status',
    'invoice_order_id',
  ];

  /**
   * Get the rawMaterial that owns the StockRawMaterial
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function rawMaterial(): BelongsTo
  {
    return $this->belongsTo(RawMaterial::class);
  }
}
