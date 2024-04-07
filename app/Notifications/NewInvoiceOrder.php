<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;

class NewInvoiceOrder extends Notification
{
  use Queueable;

  public $ADMIN;
  public $invoiceOrder;

  /**
   * Create a new notification instance.
   */
  public function __construct($ADMIN, $invoiceOrder)
  {
    $this->ADMIN = $ADMIN;
    $this->invoiceOrder = $invoiceOrder;
  }

  /**
   * Get the notification's delivery channels.
   *
   * @return array<int, string>
   */
  public function via(object $notifiable): array
  {
    return notificationVia();
  }

  /**
   * Get the mail representation of the notification.
   */
  public function toMail(object $notifiable): MailMessage
  {
    return (new MailMessage)
      ->subject(__('Heads Up! New Order Received'))
      ->greeting(__('Hello :name!', ['name' => $this->ADMIN->name]))
      ->line(__('I am pleased to inform you that a new order has been received in the store!'))
      ->line(__('Here are some details:'))
      ->line(new HtmlString('<ul>
      <li><strong>' . __('Order number: :orderNumber', ['orderNumber' => $this->invoiceOrder->id]) . '</strong></li>
      <li><strong>' . __('Customer: :customer', ['customer' => $this->invoiceOrder->user->name]) . '</strong></li>
      <li><strong>' . __('Order Date: :date', ['date' => Carbon::parse($this->invoiceOrder->created_at)->format('d/m/Y H:i:s a')]) . '</strong></li>
      <li><strong>' . __('Order Total: :total Bs.D', ['total' => $this->invoiceOrder->total]) . '</strong></li>
      </ul>'))
      ->line(__('You can see the complete order details in the admin panel.'))
      ->action(__('See order'), route('invoice-orders.showOrder', $this->invoiceOrder->id))
      ->line(__('Thanks for your attention.'));
  }

  /**
   * Get the array representation of the notification.
   *
   * @return array<string, mixed>
   */
  public function toArray(object $notifiable): array
  {
    return SchemaNotifications::schemaNotification()['new_invoice_order'];
  }
}
