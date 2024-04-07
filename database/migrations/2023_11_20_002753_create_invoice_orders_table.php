<?php

use App\Enums\InvoiceOrderStatus;
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
    Schema::create('invoice_orders', function (Blueprint $table) {
      $table->id();
      $table->string('code')->unique();
      $table->foreignId('user_id')
        ->constrained();
      $table->unsignedDecimal('total');
      $table->unsignedDecimal('discount')->nullable();
      $table->string('payment_method');
      $table->string('payment_reference');
      $table->enum('status', InvoiceOrderStatus::options())->default(InvoiceOrderStatus::UNVERIFIED->value);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('invoice_orders');
  }
};
