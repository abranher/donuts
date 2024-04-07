<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;

class StockSummary extends Notification
{
  use Queueable;

  public $user;
  public $products;
  public $lowStockProducts;

  /**
   * Create a new notification instance.
   */
  public function __construct($user, $products, $lowStockProducts)
  {
    $this->user = $user;
    $this->products = $products;
    $this->lowStockProducts = $lowStockProducts;
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
      ->subject(__('Stock Summary'))
      ->greeting(__('Hello :name!', ['name' => $this->user->name]))
      ->line(new HtmlString('<h2>' . __('I present you a summary of the current stock in our application:') . '</h2>'))
      ->line(new HtmlString('<h3>' . __('General summary:') . '</h3>'))
      ->line(new HtmlString('<ul>
      <li><strong>' . __('Total products: :number', ['number' => $this->products->count()]) . '</strong></li>
      <li><strong>' . __('Products with low stock: :low', ['low' => $this->lowStockProducts->count()]) . '</strong></li>
      </ul>'))
      ->line(new HtmlString('<h3>' . __('Products with low stock:') . '</h3>'))
      ->line(new HtmlString('<ul>' . $this->lowStockProducts->map(function ($item) {
        return '<li><strong>' . __('Product: :product - Minimum in stock: :min_stock - Stock: :stock - Maximum in stock: :max_stock', ['product' => $item->name, 'min_stock' => $item->min_stock, 'stock' => $item->stock, 'max_stock' => $item->max_stock]) . '</strong></li>';
      })->implode('') . '</ul>'))
      ->line(__('Thanks for your attention.'));
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
