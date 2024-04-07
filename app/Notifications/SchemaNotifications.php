<?php

namespace App\Notifications;

class SchemaNotifications
{
  /**
   * Get the array structure of the representation of the notification.
   *
   * @return array<string, mixed>
   */
  public static function schemaStructure(string $message, string $image = null): array
  {
    return [
      'message' => $message,
      'image' => $image == null ? asset('img/logo.jpeg') : $image,
    ];
  }

  /**
   * Get the array representation of the notification.
   *
   * @return array<string, mixed>
   */
  public static function schemaNotification(): array
  {
    return [
      'assigned_order' => self::schemaStructure('Tienes un nuevo pedido asignado.'),
      'invoice_order_paid' => self::schemaStructure(__('Your order has been verified!')),
      'new_invoice_order' => self::schemaStructure(__('Heads Up! New Order Received')),
    ];
  }
}
