<?php

namespace App\Models;

use App\Traits\hasPicture;
use App\Traits\Paginable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Advertisement extends Model
{
  use HasFactory, Paginable, hasPicture;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'title',
    'description',
    'image',
    'promotion_id',
  ];

  /**
   * Get the promotion that owns the Advertisement
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function promotion(): BelongsTo
  {
    return $this->belongsTo(Promotion::class);
  }
}
