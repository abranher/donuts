<?php

namespace App\Console\Commands;

use App\Enums\Role;
use App\Models\Product;
use App\Models\User;
use App\Notifications\StockSummary;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;

class CheckStock extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'app:check-stock';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Browse product stock and send notifications to ADMIN';

  /**
   * Execute the console command.
   */
  public function handle()
  {
    $products = Product::getStocks();

    $lowStockProducts = $products->filter(function ($product) {
      if ($product->stock > 0)
        return $product->percent <= 50;
    });

    $ADMIN = User::role(Role::ADMIN)->first();
    Notification::send($ADMIN, new StockSummary($ADMIN, $products, $lowStockProducts));

    return Command::SUCCESS;
  }

  /**
   * Envía una notificación al administrador con un resumen de los productos con bajo stock.
   *
   * @param  \Illuminate\Database\Eloquent\Collection  $lowStockProducts
   * @return void
   */
  protected function sendLowStockNotification($lowStockProducts)
  {
    // Implementar la lógica para enviar la notificación al administrador
    // con un resumen de los productos con bajo stock.
  }

  /**
   * Envía una notificación al administrador indicando que todos los productos tienen buen stock.
   *
   * @return void
   */
  protected function sendAllProductsInStockNotification()
  {
    // Implementar la lógica para enviar la notificación al administrador
    // indicando que todos los productos tienen buen stock.
  }
}
