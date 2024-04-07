<?php

namespace App\Traits;

trait Paginable
{
  /**
   * Return a paginate for models.
   *
   * @param int $lenght
   */
  public static function pag(int $lenght = 5)
  {
    return self::paginate($lenght);
  }
}
