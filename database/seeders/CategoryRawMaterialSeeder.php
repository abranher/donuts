<?php

namespace Database\Seeders;

use App\Models\CategoryRawMaterial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryRawMaterialSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    CategoryRawMaterial::create([
      'code' => 'f43aTS7J$K',
      'name' => 'Masas',
    ]);

    CategoryRawMaterial::create([
      'code' => 'hiyaTS7J$K',
      'name' => 'Glaseados',
    ]);

    CategoryRawMaterial::create([
      'code' => 'AbsIu7$2tm',
      'name' => 'Toppings',
    ]);
  }
}
