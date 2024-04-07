<?php

namespace App\Enums;

use App\Traits\BaseEnum;

enum TypeIdentificationCard: string
{
  use BaseEnum;

  case VENEZOLANO = 'VENEZOLANO';
  case JURIDICO = 'JURÍDICO';
  case EXTRANJERO = 'EXTRANJERO';
}
