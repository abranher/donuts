<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AssignedOrder extends Notification
{
  use Queueable;

  public $deliveryMan;

  /**
   * Create a new notification instance.
   */
  public function __construct($deliveryMan)
  {
    $this->deliveryMan = $deliveryMan;
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
      ->subject(__('New order assigned!'))
      ->greeting(__('Hello :name!', ['name' => $this->deliveryMan->name]))
      ->line(__('We are pleased to inform you that a new order has been assigned to you.'))
      ->action(__('View Order'), url('/'))
      ->line(__('Thank you for your collaboration!. We will keep you informed about the status of the order.'));
  }

  /**
   * Get the array representation of the notification.
   *
   * @return array<string, mixed>
   */
  public function toArray(object $notifiable): array
  {
    return SchemaNotifications::schemaNotification()['assigned_order'];
  }
}
