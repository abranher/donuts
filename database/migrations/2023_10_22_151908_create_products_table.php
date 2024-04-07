<?php

use App\Enums\SizeProduct;
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
    Schema::create('products', function (Blueprint $table) {
      $table->id();
      $table->string('code')->unique();
      $table->string('name', 60);
      $table->string('description', 200);
      $table->unsignedDecimal('price');
      $table->enum('size', SizeProduct::options());
      $table->unsignedInteger('min_stock');
      $table->unsignedInteger('max_stock');
      $table->string('image', 150);
      $table->string('image_2', 150)->nullable();
      $table->string('image_3', 150)->nullable();
      $table->boolean('hidden')
        ->default(false);
      $table->foreignId('category_product_id')
        ->constrained();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('products');
  }
};
