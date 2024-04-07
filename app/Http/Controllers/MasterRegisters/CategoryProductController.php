<?php

namespace App\Http\Controllers\MasterRegisters;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryProductRequest;
use App\Http\Requests\UpdateCategoryProductRequest;
use App\Models\CategoryProduct;
use App\Services\CategoryPrefixService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CategoryProductController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(): View
  {
    return view('inventory.category-products.index', [
      'categories' => CategoryProduct::pag()
    ]);
  }

  /**
   * Generate pdf.
   */
  public function reportPDF()
  {
    $category_products = CategoryProduct::all(['name', 'code']);

    $pdf = Pdf::loadView('pdf-reports.category-products', ['category_products' => $category_products]);
    return $pdf->stream();
  }

  /**
   * Download pdf.
   */
  public function downloadPDF()
  {
    $category_products = CategoryProduct::all(['name', 'code']);

    $pdf = Pdf::loadView('pdf-reports.category-products', ['category_products' => $category_products]);
    return $pdf->download('Listado-categorias-productos-' . date('d-m-Y-h_i_a') . '.pdf');
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(): View
  {
    return view('inventory.category-products.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreCategoryProductRequest $request): RedirectResponse
  {
    CategoryProduct::create($request->safe()->merge(['code' => CategoryPrefixService::getPrefix()])->all());

    return to_route('category-products.index')->with('status', 'Categoría creada exitosamente!');
  }

  /**
   * Display the specified resource.
   */
  public function show(CategoryProduct $category_product)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(CategoryProduct $category_product): View
  {
    return view('inventory.category-products.edit', ['category' => $category_product]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateCategoryProductRequest $request, CategoryProduct $category_product): RedirectResponse
  {
    $category_product->update($request->safe()->all());

    return to_route('category-products.index')->with('status', 'Categoría actualizada exitosamente!');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(CategoryProduct $category_product): RedirectResponse
  {
    $category_product->delete();

    return to_route('category-products.index')->with('status', 'Categoría eliminada exitosamente!');
  }
}
