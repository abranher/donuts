<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;

class DiscountCoupon extends Notification
{
  use Queueable;

  public $coupon;

  /**
   * Create a new notification instance.
   */
  public function __construct($coupon)
  {
    $this->coupon = $coupon;
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
      ->subject(__('Exclusive discount coupon for you!'))
      ->greeting(__('Hello dear user'))
      ->line(new HtmlString('<h2>' . __('Exclusive discount coupon for you!') . '</h2>'))
      ->line(__('We are pleased to offer you an exclusive discount coupon for your next purchase in our store.'))
      ->line(new HtmlString('<ul>
      <li><strong>' . __('Coupon Code: :code', ['code' => $this->coupon->code]) . '</strong></li>
      <li><strong>' . __('Discount: :discount', ['discount' => percent($this->coupon->discount)]) . '</strong></li>
      <li><strong>' . __('Valid until: :end_date', ['end_date' => Carbon::parse($this->coupon->end_date)->format('d/m/Y H:i:s a')]) . '</strong></li>
      <li><strong>' . __('Number of uses: :uses', ['uses' => $this->coupon->uses]) . '</strong></li>
      </ul>'))
      ->line(__("To redeem your coupon, simply enter the code in the 'Discount coupon' field at checkout."))
      ->line(__('We hope you enjoy this discount!'));
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
