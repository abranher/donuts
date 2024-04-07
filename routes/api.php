<?php

use App\Http\Controllers\Api\ApiUserController;
use App\Http\Controllers\Api\Deliveries\ApiDeliveryController;
use App\Http\Controllers\Api\Geolocation\ApiGeolocationController;
use App\Http\Controllers\Api\MasterRegisters\StockProductController;
use App\Http\Controllers\Api\MasterRegisters\StockRawMaterialController;
use App\Http\Controllers\Api\ProductValoration\ProductValorationController;
use App\Http\Controllers\Api\ProductValoration\ProductValorationLikeController;
use App\Http\Controllers\Api\Shop\ApiCategoryProductController;
use App\Http\Controllers\Api\Shop\ApiCouponsController;
use App\Http\Controllers\Api\Shop\ApiInvoiceOrderController;
use App\Http\Controllers\Api\Shop\ApiRecipesController;
use App\Http\Controllers\Api\Shop\ApiShopController;
use App\Http\Controllers\Notifications\NotificationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  return $request->user();
});

Route::group(['prefix' => 'v1'], function () {

  Route::get('users/{user}', [ApiUserController::class, 'show'])
    ->name('api-users.show');

  Route::apiResource('stock-raw-materials', StockRawMaterialController::class)->names([
    'index' => 'api-stock-raw-materials.index',
    'store' => 'api-stock-raw-materials.store',
    'show' => 'api-stock-raw-materials.show',
    'update' => 'api-stock-raw-materials.update',
    'destroy' => 'api-stock-raw-materials.destroy',
  ]);

  Route::apiResource('stock-products', StockProductController::class)->names([
    'index' => 'api-stock-products.index',
    'store' => 'api-stock-products.store',
    'show' => 'api-stock-products.show',
    'update' => 'api-stock-products.update',
    'destroy' => 'api-stock-products.destroy',
  ]);

  Route::apiResource('shop', ApiShopController::class)->names([
    'index' => 'api-shop.index',
    'store' => 'api-shop.store',
    'show' => 'api-shop.show',
    'update' => 'api-shop.update',
    'destroy' => 'api-shop.destroy',
  ]);

  Route::get('recipes/{user}', [ApiRecipesController::class, 'show'])
    ->name('api-recipes.show');

  Route::apiResource('category-products', ApiCategoryProductController::class)->names([
    'index' => 'api-category-products.index',
    'store' => 'api-category-products.store',
    'show' => 'api-category-products.show',
    'update' => 'api-category-products.update',
    'destroy' => 'api-category-products.destroy',
  ]);

  Route::apiResource('invoice-orders', ApiInvoiceOrderController::class)->names([
    'index' => 'api-invoice-orders.index',
    'store' => 'api-invoice-orders.store',
    'show' => 'api-invoice-orders.show',
    'update' => 'api-invoice-orders.update',
    'destroy' => 'api-invoice-orders.destroy',
  ]);

  Route::apiResource('coupons', ApiCouponsController::class)->names([
    'index' => 'api-coupons.index',
    'store' => 'api-coupons.store',
    'show' => 'api-coupons.show',
    'update' => 'api-coupons.update',
    'destroy' => 'api-coupons.destroy',
  ]);

  Route::get('notifications/{user}', [NotificationController::class, 'index'])
    ->name('api-notifications.index');

  Route::get('product-valorations/{product}', [ProductValorationController::class, 'index'])
    ->name('api-product-valorations.index');
  Route::post('product-valorations', [ProductValorationController::class, 'store'])
    ->name('api-product-valorations.store');

  Route::get('product-valorations-likes/{product_valoration}/user/{user}', [ProductValorationLikeController::class, 'show'])
    ->name('api-product-valorations-likes.show');
  Route::post('product-valorations-likes/{product_valoration}/user/{user}', [ProductValorationLikeController::class, 'store'])
    ->name('api-product-valorations-likes.store');

  /**
   * Geolocation Routes
   */
  Route::post('geolocations', [ApiGeolocationController::class, 'store'])
    ->name('geolocations.store');

  /**
   * Delivery Routes
   */
  Route::get('deliveries/map-delivery-men', [ApiDeliveryController::class, 'indexDeliveryMan'])
    ->name('api-deliveries.indexDeliveryMan');
});
