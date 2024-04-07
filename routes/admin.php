<?php

use App\Http\Controllers\AuditLog\AuditLogController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\InvoiceOrderController;
use App\Http\Controllers\MasterRegisters\CategoryProductController;
use App\Http\Controllers\MasterRegisters\CategoryRawMaterialController;
use App\Http\Controllers\MasterRegisters\DeliveryManController;
use App\Http\Controllers\MasterRegisters\ProductController;
use App\Http\Controllers\MasterRegisters\RawMaterialController;
use App\Http\Controllers\MasterRegisters\StockProductController;
use App\Http\Controllers\MasterRegisters\StockRawMaterialController;
use App\Http\Controllers\Promotions\AdvertisementController;
use App\Http\Controllers\Promotions\CouponController;
use App\Http\Controllers\Promotions\PromotionalCatProductController;
use App\Http\Controllers\Promotions\PromotionalProductController;
use App\Http\Controllers\Promotions\PromotionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified', 'logs-out-banned-user'])->group(function () {
  // Dashboard
  Route::view('panel', 'admin.dashboard')->name('admin.dashboard');

  // Delivery Man 
  Route::resource('delivery-men', DeliveryManController::class);

  // Products
  Route::get('category-products/report-pdf', [CategoryProductController::class, 'reportPDF'])
    ->name('category-products.report-pdf');
  Route::get('category-products/download-pdf', [CategoryProductController::class, 'downloadPDF'])
    ->name('category-products.download-pdf');
  Route::resource('category-products', CategoryProductController::class);

  Route::get('products/report-pdf', [ProductController::class, 'reportPDF'])
    ->name('products.report-pdf');
  Route::get('products/download-pdf', [ProductController::class, 'downloadPDF'])
    ->name('products.download-pdf');
  Route::resource('products', ProductController::class);

  Route::resource('stock-products', StockProductController::class);

  // Raw Materials
  Route::resource('category-raw-materials', CategoryRawMaterialController::class);
  Route::resource('raw-materials', RawMaterialController::class);
  Route::resource('stock-raw-materials', StockRawMaterialController::class);

  // Promotions
  Route::resource('promotions', PromotionController::class);

  // Promotional Categories Products
  Route::post('/promotional-cat-products', [PromotionalCatProductController::class, 'store'])
    ->name('promotional-cat-products.store');

  Route::delete('/promotional-cat-products/{promotionalCatProduct}', [PromotionalCatProductController::class, 'destroy'])
    ->name('promotional-cat-products.destroy');

  // Promotional Products
  Route::post('/promotional-products', [PromotionalProductController::class, 'store'])
    ->name('promotional-products.store');

  Route::delete('/promotional-products/{promotionalProduct}', [PromotionalProductController::class, 'destroy'])
    ->name('promotional-products.destroy');

  // Cupones
  Route::get('coupons/send/{coupon}', [CouponController::class, 'send'])
    ->name('coupons.send');
  Route::resource('coupons', CouponController::class);

  // Advertisements

  Route::get('advertisements', [AdvertisementController::class, 'index'])
    ->name('advertisements.index');

  Route::get('advertisements/create', [AdvertisementController::class, 'create'])
    ->name('advertisements.create');

  Route::post('advertisements', [AdvertisementController::class, 'store'])
    ->name('advertisements.store');

  // Invoices Orders
  Route::get('invoice-orders', [InvoiceOrderController::class, 'index'])
    ->name('invoice-orders.index');

  Route::get('invoice-orders/delivery-men', [InvoiceOrderController::class, 'show'])
    ->name('invoice-orders.show');

  Route::get('invoice-orders/{invoice_order}', [InvoiceOrderController::class, 'showOrder'])
    ->name('invoice-orders.showOrder');

  Route::post('invoice-orders/verify/{invoice_order}', [InvoiceOrderController::class, 'verify'])
    ->name('invoice-orders.verify');

  // Deliveries
  Route::get('deliveries', [DeliveryController::class, 'index'])
    ->name('deliveries.index');

  Route::get('deliveries/map', [DeliveryController::class, 'map'])
    ->name('deliveries.map');

  Route::post('deliveries/assignDeliveryMan/{invoice_order}', [DeliveryController::class, 'assignDeliveryMan'])
    ->name('deliveries.assignDeliveryMan');

  Route::post('deliveries/changeDeliveryMan/{invoice_order}', [DeliveryController::class, 'changeDeliveryMan'])
    ->name('deliveries.changeDeliveryMan');

  // Users
  Route::get('users', [UserController::class, 'index'])
    ->name('users.index');
  Route::get('users/{user}', [UserController::class, 'show'])
    ->name('users.show');

  // Audit Logs
  Route::get('audit-logs', [AuditLogController::class, 'index'])
    ->name('audit-logs.index');
});
