<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InvoiceOrderProDescription extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'invoice_order_id',
    'product_id',
    'quantity',
  ];

  /**
   * Get the invoiceOrder that owns the InvoiceOrderProDescription
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function invoiceOrder(): BelongsTo
  {
    return $this->belongsTo(InvoiceOrder::class);
  }

  /**
   * Get the product that owns the InvoiceOrderProDescription
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function product(): BelongsTo
  {
    return $this->belongsTo(Product::class);
  }
}
