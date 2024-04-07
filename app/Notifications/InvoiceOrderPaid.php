<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InvoiceOrderPaid extends Notification
{
  use Queueable;

  public $user;

  /**
   * Create a new notification instance.
   */
  public function __construct($user)
  {
    $this->user = $user;
  }

  /**
   * Get the notification's delivery channels.
   *
   * @return array<int, string>
   */
  public function via(object $notifiable): array
  {
    return ['mail', 'database'];
  }

  /**
   * Get the mail representation of the notification.
   */
  public function toMail(object $notifiable): MailMessage
  {
    return (new MailMessage)
      ->subject(__('Your order has been verified!'))
      ->greeting(__('Hello :name!', ['name' => $this->user->name]))
      ->line(__('We are pleased to inform you that your order #:number has been verified and is in process.', ['number' => '67er$df']))
      ->action(__('View Invoice'), url('/'))
      ->line(__('Thanks for your purchase!. We will keep you informed about the status of your order.'))
      ->line(__('We hope to see you soon!'));
  }

  /**
   * Get the array representation of the notification.
   *
   * @return array<string, mixed>
   */
  public function toArray(object $notifiable): array
  {
    return SchemaNotifications::schemaNotification()['invoice_order_paid'];
  }
}
