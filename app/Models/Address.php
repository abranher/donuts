<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Address extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'address',
    'state_id',
    'municipality_id',
  ];

  /**
   * Get the user associated with the Address
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function user(): HasOne
  {
    return $this->hasOne(User::class);
  }

  /**
   * Get the state that owns the Address
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function state(): BelongsTo
  {
    return $this->belongsTo(State::class);
  }

  /**
   * Get the municipality that owns the Address
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function municipality(): BelongsTo
  {
    return $this->belongsTo(Municipality::class);
  }
}
