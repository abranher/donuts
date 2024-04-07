<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    DB::unprepared(file_get_contents('database/seeders/files/locations.sql'));

    $this->call([
      RoleSeeder::class,
      UserSeeder::class,
      CategoryRawMaterialSeeder::class,
      RawMaterialSeeder::class,
      ImageNoProfile::class
    ]);
  }
}
