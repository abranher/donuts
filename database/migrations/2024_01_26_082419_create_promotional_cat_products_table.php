<?php

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
    Schema::create('promotional_cat_products', function (Blueprint $table) {
      $table->id();
      $table->foreignId('promotion_id')
        ->constrained();
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
    Schema::dropIfExists('promotional_cat_products');
  }
};
