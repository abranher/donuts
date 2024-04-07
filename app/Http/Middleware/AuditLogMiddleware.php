<?php

namespace App\Http\Middleware;

use App\Models\AuditLog;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

class AuditLogMiddleware
{
  /**
   * Handle an incoming request.
   *
   * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
   */
  public function handle(Request $request, Closure $next): Response
  {
    $response = $next($request);
    $route = Route::currentRouteName();
    $description = $this->descriptions[$route] ?? null;

    if (!$description || !Auth::user()) {
      return $response;
    }

    AuditLog::create([
      'user_id' => Auth::user()->id,
      'action' => $description,
    ]);

    return $response;
  }

  protected $descriptions = [
    'index' => 'Ver Página Principal',
    'privacy.policy' => 'Ver Página de Políticas de Privacidad',
    'home' => 'Ver Página Principal dentro de la app',
    'admin.dashboard' =>  'Ver Panel de Control',
    'my-invoices.index' => 'Ver Mis Pedidos',
    'my-invoices.create' => 'Sin definir',
    'my-invoices.store' => 'Sin definir',
    'my-invoices.show' => 'Sin definir',
    'my-invoices.edit' =>  'Sin definir',
    'my-invoices.update' => 'Sin definir',
    'users.index' => 'Ver Listado de Usuarios',
    'users.show' =>  'Ver Datos de Usuario',
    'shop' =>  'Ver Tienda',
    'recipes.index' =>  'Sin definir',
    'recipes.create' =>  'Sin definir',
    'recipes.store' =>  'Sin definir',
    'recipes.show' =>  'Sin definir',
    'recipes.edit' =>  'Sin definir',
    'recipes.update' =>  'Sin definir',
    'recipes.destroy' =>  'Sin definir',
    'category-products.index' =>  'Sin definir',
    'category-products.create' =>  'Sin definir',
    'category-products.store' =>  'Sin definir',
    'category-products.show' =>  'Sin definir',
    'category-products.edit' =>  'Sin definir',
    'category-products.update' =>  'Sin definir',
    'category-products.destroy' =>  'Sin definir',
    'products.index' =>  'Sin definir',
    'products.create' =>  'Sin definir',
    'products.store' =>  'Sin definir',
    'products.show' =>  'Sin definir',
    'products.edit' =>  'Sin definir',
    'products.update' =>  'Sin definir',
    'products.destroy' =>  'Sin definir',
    'stock-products.index' =>  'Sin definir',
    'stock-products.create' =>  'Sin definir',
    'stock-products.store' =>  'Sin definir',
    'stock-products.show' =>  'Sin definir',
    'stock-products.edit' =>  'Sin definir',
    'stock-products.update' =>  'Sin definir',
    'stock-products.destroy' =>  'Sin definir',
    'category-raw-materials.index' =>  'Sin definir',
    'category-raw-materials.create' =>  'Sin definir',
    'category-raw-materials.store' =>  'Sin definir',
    'category-raw-materials.show' =>  'Sin definir',
    'category-raw-materials.edit' =>  'Sin definir',
    'category-raw-materials.update' =>  'Sin definir',
    'category-raw-materials.destroy' =>  'Sin definir',
    'raw-materials.index' =>  'Sin definir',
    'raw-materials.create' =>  'Sin definir',
    'raw-materials.store' =>  'Sin definir',
    'raw-materials.show' =>  'Sin definir',
    'raw-materials.edit' =>  'Sin definir',
    'raw-materials.update' =>  'Sin definir',
    'raw-materials.destroy' =>  'Sin definir',
    'stock-raw-materials.index' =>  'Sin definir',
    'stock-raw-materials.create' =>  'Sin definir',
    'stock-raw-materials.store' =>  'Sin definir',
    'stock-raw-materials.show' =>  'Sin definir',
    'stock-raw-materials.edit' =>  'Sin definir',
    'stock-raw-materials.update' =>  'Sin definir',
    'stock-raw-materials.destroy' =>  'Sin definir',
    'deliveries.assignDeliveryMan' =>  'Sin definir',
    'deliveries.changeDeliveryMan' =>  'Sin definir',
    'deliveries.index' =>  'Sin definir',
    'deliveries.create' =>  'Sin definir',
    'deliveries.store' =>  'Sin definir',
    'deliveries.show' =>  'Sin definir',
    'deliveries.edit' =>  'Sin definir',
    'deliveries.update' =>  'Sin definir',
    'deliveries.destroy' =>  'Sin definir',
    'delivery-men.index' =>  'Sin definir',
    'delivery-men.create' =>  'Sin definir',
    'delivery-men.store' =>  'Sin definir',
    'delivery-men.show' =>  'Sin definir',
    'delivery-men.edit' =>  'Sin definir',
    'delivery-men.update' =>  'Sin definir',
    'delivery-men.destroy' =>  'Sin definir',
    'invoice-orders.verify' =>  'Sin definir',
    'invoice-orders.index' =>  'Ver Listado de Pedidos',
    'invoice-orders.create' =>  'Sin definir',
    'invoice-orders.store' =>  'Sin definir',
    'invoice-orders.show' => 'Sin definir',
    'invoice-orders.edit' =>  'Sin definir',
    'invoice-orders.update' =>  'Sin definir',
    'invoice-orders.destroy' =>  'Sin definir',
    'delivery.user.delivery' =>  'Sin definir',
    'delivery-man.takeOrder' =>  'Sin definir',
    'delivery-man.finishOrder' =>  'Sin definir',
    'delivery-man.index' =>  'Sin definir',
    'delivery-man.create' =>  'Sin definir',
    'delivery-man.store' =>  'Sin definir',
    'delivery-man.show' =>  'Sin definir',
    'delivery-man.edit' =>  'Sin definir',
    'delivery-man.update' =>  'Sin definir',
    'delivery-man.destroy' =>  'Sin definir',
    'promotions.index' =>  'Sin definir',
    'promotions.create' =>  'Sin definir',
    'promotions.store' =>  'Sin definir',
    'promotions.show' =>  'Sin definir',
    'promotions.edit' =>  'Sin definir',
    'promotions.update' =>  'Sin definir',
    'promotions.destroy' =>  'Sin definir',
    'promotional-cat-products.store' =>  'Sin definir',
    'promotional-cat-products.destroy' =>  'Sin definir',
    'promotional-products.store' =>  'Sin definir',
    'promotional-products.destroy' =>  'Sin definir',
    'coupons.index' =>  'Sin definir',
    'coupons.create' =>  'Sin definir',
    'coupons.store' =>  'Sin definir',
    'coupons.show' =>  'Sin definir',
    'coupons.edit' =>  'Sin definir',
    'coupons.update' =>  'Sin definir',
    'coupons.destroy' =>  'Sin definir',
    'registro' =>  'Sin definir',
    'registro.register' =>  'Sin definir',
    'login' =>  'Sin definir',
    'login.iniciar' =>  'Sin definir',
    'logout' =>  'Sin definir',
    'verification.notice' =>  'Sin definir',
    'verification.verify' =>  'Sin definir',
    'verification.send' =>  'Sin definir',
    'password.request' =>  'Sin definir',
    'password.email' =>  'Sin definir',
    'password.reset' =>  'Sin definir',
    'password.update' =>  'Sin definir',
    'profile.show' =>  'Sin definir',
    'profile.edit' =>  'Sin definir',
    'profile.update' =>  'Sin definir',
    'profile.changeImage' =>  'Sin definir',
    'secret_token.create' =>  'Sin definir',
    'secret_token.store' =>  'Sin definir',
  ];
}
