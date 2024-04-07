<?php

namespace App\Enums;

use App\Traits\BaseEnum;

enum VehicleType: string
{
  use BaseEnum;

  case CAMION = 'CAMIÓN';
  case AUTOMOVIL = 'AUTOMÓVIL';
  case MOTOCICLETA = 'MOTOCICLETA';
}
