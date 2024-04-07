<?php

namespace App\Http\Controllers;

use App\Enums\InvoiceOrderStatus;
use App\Models\Delivery;
use App\Models\InvoiceOrder;
use App\Notifications\AssignedOrder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\View\View;

class DeliveryController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(): View
  {
    $deliveries = Delivery::with(['deliveryMan', 'invoiceOrder'])->get()->each(function ($delivery) {
      $delivery->deliveryMan->user;
    });

    return view('admin.deliveries.index', [
      'deliveries' => pagination($deliveries)
    ]);
  }

  /**
   * Display a listing of the resource.
   */
  public function map(): View
  {
    return view('admin.deliveries.map');
  }

  /**
   * Assign Delivery Man to InvoiceOrder.
   */
  public function assignDeliveryMan(Request $request, InvoiceOrder $invoiceOrder): RedirectResponse
  {
    $request->validate(['delivery_man_id' => 'required']);

    $invoiceOrder->status = InvoiceOrderStatus::IN_PROGRESS->value;
    $invoiceOrder->save();

    $delivery = Delivery::create([
      'invoice_order_id' => $invoiceOrder->id,
      'delivery_man_id' => $request->delivery_man_id,
    ]);

    $deliveryMan = $delivery->deliveryMan->user;

    Notification::send($deliveryMan, new AssignedOrder($deliveryMan));

    return to_route('invoice-orders.index')->with('status', 'Repartidor asignado!');
  }

  /**
   * Change Delivery Man to InvoiceOrder.
   */
  public function changeDeliveryMan(Request $request, InvoiceOrder $invoiceOrder): RedirectResponse
  {
    $request->validate(['delivery_man_id' => 'required']);

    $invoiceOrder->delivery->delivery_man_id = $request->delivery_man_id;
    $invoiceOrder->delivery->save();

    $deliveryMan = $invoiceOrder->delivery->deliveryMan->user;

    Notification::send($deliveryMan, new AssignedOrder($deliveryMan));

    return to_route('invoice-orders.index')->with('status', 'Repartidor cambiado!');
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
  public function show(Delivery $delivery)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Delivery $delivery)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Delivery $delivery)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Delivery $delivery)
  {
    //
  }
}
