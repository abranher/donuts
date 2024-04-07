<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InvoiceOrderRecDescription extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'invoice_order_id',
    'recipe_id',
    'quantity',
  ];

  /**
   * Get the invoiceOrder that owns the InvoiceOrderRecDescription
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function invoiceOrder(): BelongsTo
  {
    return $this->belongsTo(InvoiceOrder::class);
  }

  /**
   * Get the recipe that owns the InvoiceOrderRecDescription
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function recipe(): BelongsTo
  {
    return $this->belongsTo(Recipe::class);
  }
}
