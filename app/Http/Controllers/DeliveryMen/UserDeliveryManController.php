<?php

namespace App\Http\Controllers\DeliveryMen;

use App\Enums\DeliveryStatus;
use App\Enums\InvoiceOrderStatus;
use App\Http\Controllers\Controller;
use App\Models\InvoiceOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserDeliveryManController extends Controller
{
  public function getData(): array
  {
    return [
      'DeliveryStatus' => DeliveryStatus::swap(),
    ];
  }
  /**
   * Display a listing of the resource.
   */
  public function index(): View
  {
    $user = Auth::user();
    $user->deliveryMan->deliveries->each(function ($delivery) {
      $delivery->invoiceOrder->user->address->state;
      $delivery->invoiceOrder->user->address->municipality;
    });

    $deliveriesDelivered = $user->deliveryMan->deliveries->filter(fn ($delivery) => $delivery->status == DeliveryStatus::DELIVERED->value);
    $deliveries = $user->deliveryMan->deliveries->filter(fn ($delivery) => $delivery->status == DeliveryStatus::UNACCEPTED->value || $delivery->status == DeliveryStatus::ACCEPTED->value);

    $data = $this->getData();
    $data['deliveries'] = $deliveries;
    $data['deliveriesDelivered'] = $deliveriesDelivered;

    return view('delivery-man.index', $data);
  }

  /**
   * Delivery Man take Order
   */
  public function takeOrder(InvoiceOrder $delivery_man)
  {
    $delivery_man->delivery->status = DeliveryStatus::ACCEPTED->value;
    $delivery_man->delivery->save();

    return to_route('delivery-man.index')->with('status', 'Pedido tomado!');
  }

  /**
   * Delivery Man finish Order
   */
  public function finishOrder(InvoiceOrder $delivery_man)
  {
    $delivery_man->delivery->status = DeliveryStatus::DELIVERED->value;
    $delivery_man->delivery->save();

    $delivery_man->status = InvoiceOrderStatus::FINISHED->value;
    $delivery_man->save();

    return to_route('delivery-man.index')->with('status', 'Pedido Entregado!');
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   */
  public function show(InvoiceOrder $delivery_man)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(InvoiceOrder $delivery_man): View
  {
    $delivery_man->invoiceOrderProDescriptions->each(function ($description) {
      $description->product->sale_price = round($description->product->price + $description->product->price * 0.16, 2);
    });
    $delivery_man->invoiceOrderRecDescriptions->each(function ($description) {
      $description->recipe;
    });

    $delivery_man->user->identificationCard;
    $delivery_man->user->phone;

    $data = $this->getData();
    $data['invoice_order'] = $delivery_man;
    $data['customer'] = $delivery_man->user;
    $data['descriptionsPro'] = $delivery_man->invoiceOrderProDescriptions;
    $data['descriptionsRec'] = $delivery_man->invoiceOrderRecDescriptions;
    $data['state'] = $delivery_man->user->address->state;
    $data['municipality'] = $delivery_man->user->address->municipality;
    $data['delivery'] = $delivery_man->delivery;

    return view('delivery-man.order-description', $data);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, InvoiceOrder $delivery_man)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(InvoiceOrder $delivery_man)
  {
    //
  }
}
