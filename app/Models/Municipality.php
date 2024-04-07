<?php

namespace App\Models;

use App\Traits\BaseSelect;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Municipality extends Model
{
  use HasFactory, BaseSelect;

  /**
   * Get the state that owns the Municipality
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function state(): BelongsTo
  {
    return $this->belongsTo(State::class);
  }

  /**
   * Get all of the addresses for the Municipality
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function addresses(): HasMany
  {
    return $this->hasMany(Address::class);
  }
}
