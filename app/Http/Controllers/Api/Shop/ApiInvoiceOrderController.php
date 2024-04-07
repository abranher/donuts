<?php

namespace App\Http\Controllers\Api\Shop;

use App\Enums\StockStatus;
use App\Http\Controllers\Controller;
use App\Models\InvoiceOrder;
use App\Models\InvoiceOrderProDescription;
use App\Models\InvoiceOrderRecDescription;
use App\Models\Product;
use App\Models\RawMaterial;
use App\Models\User;
use App\Notifications\NewInvoiceOrder;
use App\Services\CodeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class ApiInvoiceOrderController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $cart = collect($request->cart);
    $cartRecipe = collect($request->cartRecipe);
    $now = now();
    $proWithStocks = Product::getStocks();
    $rawWithStocks = RawMaterial::getStocks();

    $invoiceOrder = InvoiceOrder::create([
      'code' => CodeService::getCode('invoice_orders'),
      'user_id' => $request->user_id,
      'total' => $request->total,
      'discount' => $request->discount,
      'payment_method' => $request->payment_method,
      'payment_reference' => $request->payment_reference,
    ]);

    // Products
    if ($cart->count() != 0) {
      $products = [];
      foreach ($cart as $key => $cartItem) {

        foreach ($proWithStocks as $proStocks) {
          if ($proStocks->id != $cartItem['id']) {
            continue;
          }
          $chunk = $proStocks->stocks->splice(0, $cartItem['quantity']);

          foreach ($chunk as $stock) {
            $stock->status = StockStatus::SOLD->value;
            $stock->invoice_order_id = $invoiceOrder->id;
            $stock->save();
          }
        }
        $products[$key] = [
          'invoice_order_id' => $invoiceOrder->id,
          'product_id' => $cartItem['id'],
          'quantity' => $cartItem['quantity'],
          'created_at' => $now,
          'updated_at' => $now,
        ];
      }
      InvoiceOrderProDescription::insert($products);
    }

    // Recipes
    if ($cartRecipe->count() != 0) {
      $recipes = [];
      foreach ($cartRecipe as $key => $recipe) {

        foreach ($recipe['raw_materials'] as $rawMaterial) {

          foreach ($rawWithStocks as $rawStocks) {
            if ($rawStocks->id != $rawMaterial['id']) {
              continue;
            }
            $chunk = $rawStocks->stocks->splice(0, $recipe['quantity'] * $rawStocks->amount_per_donut);

            foreach ($chunk as $stock) {
              $stock->status = StockStatus::SOLD->value;
              $stock->invoice_order_id = $invoiceOrder->id;
              $stock->save();
            }
          }
        }

        $recipes[$key] = [
          'invoice_order_id' => $invoiceOrder->id,
          'recipe_id' => $recipe['id'],
          'quantity' => $recipe['quantity'],
          'created_at' => $now,
          'updated_at' => $now,
        ];
      }
      InvoiceOrderRecDescription::insert($recipes);
    }

    $ADMIN = User::role('ADMIN')->first();
    Notification::send($ADMIN, new NewInvoiceOrder($ADMIN, $invoiceOrder));

    return success("Pedido procesado!");
  }

  /**
   * Display the specified resource.
   */
  public function show(InvoiceOrder $invoiceOrder)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, InvoiceOrder $invoiceOrder)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(InvoiceOrder $invoiceOrder)
  {
    //
  }
}
