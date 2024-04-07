<?php

namespace Database\Seeders;

use App\Enums\UnitOfMeasurement;
use App\Models\RawMaterial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RawMaterialSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    RawMaterial::create([
      'code' => 'kljA#34@aV',
      'name' => 'Masa para donas',
      'description' => 'Masa para donas',
      'price' => 3.67,
      'unit' => UnitOfMeasurement::GRAMOS,
      'amount_per_donut' => 90,
      'min_stock' => 20,
      'max_stock' => 12220,
      'model' => 'masa',
      'category_raw_material_id' => 1,
    ]);

    RawMaterial::create([
      'code' => 'NFjA#Od@aV',
      'name' => 'Glaseado de chocolate clásico',
      'description' => 'Glaseado de chocolate clásico para cubrir donas',
      'price' => 2.34,
      'unit' => UnitOfMeasurement::MILILITROS,
      'amount_per_donut' => 30,
      'min_stock' => 10,
      'max_stock' => 120,
      'model' => 'glaseado_de_chocolate_clasico',
      'category_raw_material_id' => 2,
    ]);

    RawMaterial::create([
      'code' => 'Vwowerysx7',
      'name' => 'Glaseado de vainilla clásico',
      'description' => 'Glaseado de vainilla clásico para cubrir donas',
      'price' => '3.39',
      'unit' => UnitOfMeasurement::MILILITROS,
      'amount_per_donut' => 30,
      'min_stock' => '10',
      'max_stock' => '100',
      'model' => 'glaseado_de_vainilla_clasico',
      'category_raw_material_id' => 2,
    ]);

    RawMaterial::create([
      'code' => 'oJIR68QiGs',
      'name' => 'Glaseado de fresa',
      'description' => 'Glaseado de fresa para cubrir donas',
      'price' => 1.22,
      'unit' => UnitOfMeasurement::MILILITROS,
      'amount_per_donut' => 30,
      'min_stock' => 10,
      'max_stock' => 100,
      'model' => 'glazed-of-strawberry.png',
      'category_raw_material_id' => 2,
    ]);

    RawMaterial::create([
      'code' => 'YeZl2dhMRa',
      'name' => 'Chispas de fresa',
      'description' => 'Chispas de fresa para cubrir glaseado de dona',
      'price' => 0.67,
      'unit' => UnitOfMeasurement::GRAMOS,
      'amount_per_donut' => 20,
      'min_stock' => 10,
      'max_stock' => 200,
      'model' => 'chispas_de_fresa',
      'category_raw_material_id' => 3,
    ]);

    RawMaterial::create([
      'code' => 'C4reImWAS&',
      'name' => 'Chispas de chocolate',
      'description' => 'Chispas de chocolate para cubrir glaseado de dona',
      'price' => 0.79,
      'unit' => UnitOfMeasurement::GRAMOS,
      'amount_per_donut' => 20,
      'min_stock' => 10,
      'max_stock' => 250,
      'model' => 'chispas_de_chocolate',
      'category_raw_material_id' => 3,
    ]);

    RawMaterial::create([
      'code' => 'z&9ri9O6c6',
      'name' => 'Chispas de colores',
      'description' => 'Chispas de colores para cubrir glaseado de dona',
      'price' => 1.79,
      'unit' => UnitOfMeasurement::GRAMOS,
      'amount_per_donut' => 20,
      'min_stock' => 10,
      'max_stock' => 240,
      'model' => 'colors-chips.png',
      'category_raw_material_id' => 3,
    ]);
  }
}
