<?php

namespace App\Http\Controllers\MasterRegisters;

use App\Enums\SizeProduct;
use App\Http\Controllers\Controller;
use App\Http\Requests\MasterRegisters\StoreProductRequest;
use App\Http\Requests\MasterRegisters\UpdateProductRequest;
use App\Models\CategoryProduct;
use App\Models\Product;
use App\Services\ProductCodeService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProductController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(): View
  {
    return view('inventory.products.index', [
      'products' => Product::with('categoryProduct')->paginate(5),
    ]);
  }

  /**
   * Generate pdf.
   */
  public function reportPDF()
  {
    $products = Product::with('categoryProduct')->get();

    $pdf = Pdf::loadView('pdf-reports.products', ['products' => $products]);
    return $pdf->stream();
  }

  /**
   * Download pdf.
   */
  public function downloadPDF()
  {
    $products = Product::with('categoryProduct')->get();

    $pdf = Pdf::loadView('pdf-reports.products', ['products' => $products]);
    return $pdf->download('Listado-productos-' . date('d-m-Y-h_i_a') . '.pdf');
  }

  public function getData(): array
  {
    return [
      'categories' => CategoryProduct::all(),
      'sizes' => SizeProduct::options(),
    ];
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(): View
  {
    return view('inventory.products.create', $this->getData());
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreProductRequest $request): RedirectResponse
  {
    Product::create(
      $request->safe()->merge([
        'code' => ProductCodeService::getCode($request->validated('category_product_id')),
        'image' => $request->file('image')->store('/', 'products'),
      ])
        ->all()
    );

    return to_route('products.index')->with('status', 'Producto creado exitosamente!');
  }

  /**
   * Display the specified resource.
   */
  public function show(Product $product): View
  {
    $category = CategoryProduct::find($product->category_products_id);

    return view('inventory.products.show', ['product' => $product, 'category' => $category]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Product $product): View
  {
    $data = $this->getData();
    $data['product'] = $product;

    return view('inventory.products.edit', $data);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateProductRequest $request, Product $product): RedirectResponse
  {
    if ($request->hasFile('image')) {
      Storage::disk('products')->delete($product->image);

      $product->update(
        $request->safe()->merge([
          'image' => $request->file('image')->store('/', 'products'),
        ])
          ->all()
      );
    } else {
      $product->update($request->safe()->all());
    }

    return to_route('products.index')->with('status', 'Producto actualizado exitosamente!');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Product $product): RedirectResponse
  {
    Storage::disk('products')->delete($product->image);

    $product->delete();

    return to_route('products.index')
      ->with('status', 'Producto eliminado exitosamente!');
  }
}
