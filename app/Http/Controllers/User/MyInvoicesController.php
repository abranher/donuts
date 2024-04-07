<?php

namespace App\Http\Controllers\User;

use App\Enums\DeliveryStatus;
use App\Enums\InvoiceOrderStatus;
use App\Http\Controllers\Controller;
use App\Models\InvoiceOrder;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class MyInvoicesController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(): View
  {
    $user = Auth::user();

    return view('my-invoices.index', [
      'invoice' => $user->invoiceOrders,
      'invoiceOrders' => $user->invoiceOrders->filter(fn ($order) => $order->status != InvoiceOrderStatus::FINISHED->value),
      'invoiceOrdersFinished' => $user->invoiceOrders->filter(fn ($order) => $order->status == InvoiceOrderStatus::FINISHED->value),
      'InvoiceOrderStatus' => InvoiceOrderStatus::swap(),
    ]);
  }

  /**
   * Display description od Order
   */
  public function show(InvoiceOrder $invoiceOrder): View
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
    $data['invoiceOrder'] = $invoiceOrder;
    $data['customer'] = $invoiceOrder->user;
    $data['descriptionsPro'] = $invoiceOrder->invoiceOrderProDescriptions;
    $data['descriptionsRec'] = $invoiceOrder->invoiceOrderRecDescriptions;
    $data['state'] = $invoiceOrder->user->address->state;
    $data['municipality'] = $invoiceOrder->user->address->municipality;
    $data['InvoiceOrderStatus'] = InvoiceOrderStatus::swap();

    return view('my-invoices.show-order-description', $data);
  }

  /**
   * Download pdf.
   */
  public function downloadPDF(InvoiceOrder $invoiceOrder)
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
    $data['invoiceOrder'] = $invoiceOrder;
    $data['customer'] = $invoiceOrder->user;
    $data['descriptionsPro'] = $invoiceOrder->invoiceOrderProDescriptions;
    $data['descriptionsRec'] = $invoiceOrder->invoiceOrderRecDescriptions;
    $data['state'] = $invoiceOrder->user->address->state;
    $data['municipality'] = $invoiceOrder->user->address->municipality;
    $data['InvoiceOrderStatus'] = InvoiceOrderStatus::swap();

    $pdf = Pdf::loadView('pdf-reports.invoice', $data);
    return $pdf->download('Factura-#' . $invoiceOrder->id . '-' . date('d-m-Y-h_i_a') . '.pdf');
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
  public function edit(string $id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
  }
}
