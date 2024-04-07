<?php

namespace App\Enums;

use App\Traits\BaseEnum;

enum UnitOfMeasurement: string
{
  use BaseEnum;

  case KILOGRAMOS = 'KILOGRAMOS';
  case GRAMOS = 'GRAMOS';
  case MILIGRAMOS = 'MILIGRAMOS';
  case LITROS = 'LITROS';
  case MILILITROS = 'MILILITROS';
}
