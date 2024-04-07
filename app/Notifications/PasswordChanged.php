<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PasswordChanged extends Notification
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
    return ['mail'];
  }

  /**
   * Get the mail representation of the notification.
   */
  public function toMail(object $notifiable): MailMessage
  {
    return (new MailMessage)
      ->subject(__('Your password has been changed successfully!'))
      ->greeting(__('Hello :name!', ['name' => $this->user->name]))
      ->line(__('We write to you to inform you that your password has been successfully changed. If you did’nt start this change, please contact our support team immediately.'))
      ->action(__('Log in'), route('login'))
      ->line(__('Thank you for using our application!'));
  }

  /**
   * Get the array representation of the notification.
   *
   * @return array<string, mixed>
   */
  public function toArray(object $notifiable): array
  {
    return [
      //
    ];
  }
}
