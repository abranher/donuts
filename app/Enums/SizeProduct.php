<?php

namespace App\Enums;

use App\Traits\BaseEnum;

enum SizeProduct: string
{
  use BaseEnum;

  case MINI = 'MINI';
  case NORMAL = 'NORMAL';
  case JUMBO = 'JUMBO';
}
