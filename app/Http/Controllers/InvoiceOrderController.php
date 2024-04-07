<?php

namespace App\Http\Controllers;

use App\Enums\DeliveryStatus;
use App\Enums\InvoiceOrderStatus;
use App\Models\Delivery;
use App\Models\DeliveryMan;
use App\Models\InvoiceOrder;
use App\Notifications\InvoiceOrderPaid;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\View\View;

class InvoiceOrderController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(): View
  {
    $invoiceOrders = InvoiceOrder::with(['user', 'delivery'])->get()->each(function ($invoiceOrder) {
      $invoiceOrder->user->identificationCard;
      $invoiceOrder->user->phone;
      $invoiceOrder->user->address;
    });

    $ordersUnverified = $invoiceOrders->filter(fn ($order) => $order->status == InvoiceOrderStatus::UNVERIFIED->value);

    return view('admin.invoices-orders.index', [
      'invoice_orders' => pagination($invoiceOrders),
      'InvoiceOrderStatus' => InvoiceOrderStatus::swap(),
      'delivery_men' => DeliveryMan::with(['user'])->get(),
      'DeliveryStatus' => DeliveryStatus::swap(),
      'ordersUnverified' => $ordersUnverified->count(),
      'deliveries' => Delivery::with('deliveryMan')->get(),
    ]);
  }

  public function verify(Request $request, InvoiceOrder $invoiceOrder): RedirectResponse
  {
    $invoiceOrder->status = InvoiceOrderStatus::UNASSIGNED->value;
    $invoiceOrder->save();

    Notification::send($invoiceOrder->user, new InvoiceOrderPaid($invoiceOrder->user));

    return to_route('invoice-orders.index')->with('status', 'Pedido verificado!');
  }

  /**
   * Display the specified resource.
   */
  public function show(): View
  {
    return view('admin.invoices-orders.show', [
      'delivery_men' => pagination(DeliveryMan::with(['user', 'deliveries'])->get()),
    ]);
  }

  public function showOrder(InvoiceOrder $invoiceOrder): View
  {
    $invoiceOrder->invoiceOrderProDescriptions->each(function ($description) {
      $description->product->sale_price = round($description->product->price + $description->product->price * 0.16, 2);
    });
    $invoiceOrder->invoiceOrderRecDescriptions->each(function ($description) {
      $description->recipe;
    });

    $invoiceOrder->user->identificationCard;
    $invoiceOrder->user->phone;

    $data = [];
    $data['invoice_order'] = $invoiceOrder;
    $data['customer'] = $invoiceOrder->user;
    $data['descriptionsPro'] = $invoiceOrder->invoiceOrderProDescriptions;
    $data['descriptionsRec'] = $invoiceOrder->invoiceOrderRecDescriptions;
    $data['state'] = $invoiceOrder->user->address->state;
    $data['municipality'] = $invoiceOrder->user->address->municipality;
    $data['DeliveryStatus'] = DeliveryStatus::swap();

    return view('admin.invoices-orders.show-order-description', $data);
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
   * Show the form for editing the specified resource.
   */
  public function edit(InvoiceOrder $invoiceOrder)
  {
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, InvoiceOrder $invoiceOrder)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(InvoiceOrder $invoiceOrder)
  {
    //
  }
}
