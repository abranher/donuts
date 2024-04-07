<?php

namespace App\Enums;

use App\Traits\BaseEnum;

enum InvoiceOrderStatus: string
{
  use BaseEnum;

  case UNVERIFIED = 'UNVERIFIED';
  case UNASSIGNED = 'UNASSIGNED';
  case IN_PROGRESS = 'IN_PROGRESS';
  case FINISHED = 'FINISHED';

  public static function translation()
  {
    return [
      'UNVERIFIED' => 'NO VERIFICADO',
      'UNASSIGNED' => 'SIN ASIGNAR',
      'IN_PROGRESS' => 'EN CURSO',
      'FINISHED' => 'FINALIZADO',
    ];
  }

  public static function color()
  {
    return [
      'UNVERIFIED' => 'red',
      'UNASSIGNED' => 'yellow',
      'IN_PROGRESS' => 'blue',
      'FINISHED' => 'green',
    ];
  }
}
