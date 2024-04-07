<?php

use App\Enums\StockStatus;
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
    Schema::create('stock_raw_materials', function (Blueprint $table) {
      $table->id();
      $table->string('code');
      $table->foreignId('raw_material_id')
        ->constrained();
      $table->date('expires_at');
      $table->enum('status', StockStatus::options())->default(StockStatus::AVAILABLE->value);
      $table->foreignId('invoice_order_id')
        ->nullable()
        ->constrained();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('stock_raw_materials');
  }
};
