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
    Schema::create('invoice_order_pro_descriptions', function (Blueprint $table) {
      $table->id();
      $table->foreignId('invoice_order_id')
        ->constrained();
      $table->foreignId('product_id')
        ->constrained();
      $table->unsignedInteger('quantity');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('invoice_order_pro_descriptions');
  }
};
