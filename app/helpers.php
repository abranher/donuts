<?php

use App\Enums\DeliveryStatus;
use App\Enums\InvoiceOrderStatus;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Str;

if (!function_exists('current_user')) {
  function current_user()
  {
    return auth()->user();
  }
}

if (!function_exists('sub')) {
  function sub(string $string): string
  {
    return strlen($string) > 30 ? Str::substr($string, 0, 30) . '...' : $string;
  }
}

if (!function_exists('phone')) {
  function phone(string $code, string $number): string
  {
    return $code . '-' . $number;
  }
}

if (!function_exists('IDCARD')) {
  function IDCARD(string $type, string $number): string
  {
    return $type . '-' . $number;
  }
}

if (!function_exists('address')) {
  function address(string $address): string
  {
    return strlen($address) > 30 ? Str::substr($address, 0, 30) . '...' : $address;
  }
}

if (!function_exists('percent')) {
  function percent(float $number): string
  {
    return ($number * 100) . ' %';
  }
}

if (!function_exists('success')) {
  function success(string $message = null, $data = null, int $code = 200)
  {
    return response()->json([
      'status' => true,
      'type' => 'success',
      'data' => $data,
      'message' => $message,
    ], $code);
  }
}

if (!function_exists('error')) {
  function error(string $message = null, $data = null, int $code = 404)
  {
    return response()->json([
      'status' => false,
      'type' => 'error',
      'data' => $data,
      'message' => $message,
    ], $code);
  }
}

if (!function_exists('pagination')) {
  function pagination($data)
  {
    $perPage = 5;
    $currentPage = request('page');
    $total = $data->count();
    $items = $data->forPage($currentPage, $perPage);

    return new LengthAwarePaginator(
      $items,
      $total,
      $perPage,
      $currentPage,
      [
        'path' => url()->current(),
        'pageName' => 'page',
      ]
    );
  }
}

// Helpers for invoiceOrders

/**
 * Return tranlation of invoiceOrder
 */
if (!function_exists('statusInvoice')) {
  function statusInvoice(string $status): string
  {
    return InvoiceOrderStatus::translation()[$status];
  }
}

/**
 * Return class with color
 */
if (!function_exists('colorInvoice')) {
  function colorInvoice(string $status): string
  {
    return "px-2.5 py-0.5 rounded-md font-bold text-base text-center bg-" . InvoiceOrderStatus::color()[$status] . "-100 border border-" . InvoiceOrderStatus::color()[$status] . "-100 dark:text-" . InvoiceOrderStatus::color()[$status] . "-300 text-" . InvoiceOrderStatus::color()[$status] . "-600";
  }
}

// Helpers for Format Address

/**
 * Return full address
 */
if (!function_exists('fullAddress')) {
  function fullAddress(string $address, string $municipality, string $state): string
  {
    return $address . ". Municipio " . $municipality . ". Estado " . $state;
  }
}

// Helpers for Deliveries

if (!function_exists('statusDelivery')) {
  function statusDelivery(string $status): string
  {
    return DeliveryStatus::translation()[$status];
  }
}

/**
 * Return class with color
 */
if (!function_exists('colorDelivery')) {
  function colorDelivery(string $status): string
  {
    return "px-2.5 py-0.5 rounded-md font-bold text-base text-center bg-" . DeliveryStatus::color()[$status] . "-100 border border-" . DeliveryStatus::color()[$status] . "-100 dark:text-" . DeliveryStatus::color()[$status] . "-300 text-" . DeliveryStatus::color()[$status] . "-600";
  }
}

/**
 * Ruturn delivery man with vehicle
 */
if (!function_exists('deliveryManVehicle')) {
  function deliveryManVehicle(string $name, string $vehicle): string
  {
    return $name . ' - ' . $vehicle;
  }
}

/**
 * Notification via
 */
if (!function_exists('notificationVia')) {
  function notificationVia(): array
  {
    return ['mail', 'database'];
  }
}
