<?php

use App\Enums\UnitOfMeasurement;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('raw_materials', function (Blueprint $table) {
      $table->id();
      $table->string('code')->unique();
      $table->string('name', 60);
      $table->string('description', 200);
      $table->unsignedDecimal('price');
      $table->enum('unit', UnitOfMeasurement::options());
      $table->unsignedInteger('amount_per_donut');
      $table->unsignedInteger('min_stock');
      $table->unsignedInteger('max_stock');
      $table->string('image', 150)->nullable();
      $table->string('model', 100);
      $table->foreignId('category_raw_material_id')
        ->constrained();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('raw_materials');
  }
};
