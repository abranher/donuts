<?php

namespace App\Enums;

use App\Traits\BaseEnum;

enum PhoneCode: string
{
  use BaseEnum;

  case VE_0412 = '0412';
  case VE_0414 = '0414';
  case VE_0416 = '0416';
  case VE_0424 = '0424';
  case VE_0426 = '0426';
}
