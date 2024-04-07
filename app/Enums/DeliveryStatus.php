<?php

namespace App\Enums;

use App\Traits\BaseEnum;

enum DeliveryStatus: string
{
  use BaseEnum;

  case UNACCEPTED = 'UNACCEPTED';
  case ACCEPTED = 'ACCEPTED';
  case DELIVERED = 'DELIVERED';

  public static function translation()
  {
    return [
      'UNACCEPTED' => 'NO ACEPTADO',
      'ACCEPTED' => 'ACEPTADO',
      'DELIVERED' => 'ENTREGADO',
    ];
  }

  public static function color()
  {
    return [
      'UNACCEPTED' => 'yellow',
      'ACCEPTED' => 'blue',
      'DELIVERED' => 'green',
    ];
  }
}
