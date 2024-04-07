<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class ImageNoProfile extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    Storage::putFileAs('public/images_profile', new File(database_path("seeders/files/noperfil.jpg")), '20240118xgWsT1W1FHcPP5k7gWhT3rm7Qr8fyHdHpURJ5sg5oTpoy.jpg');
  }
}
