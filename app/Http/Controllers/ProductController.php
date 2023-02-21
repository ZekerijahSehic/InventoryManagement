<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller {

    public function __construct(private ProductRepository $productRepository) {}

    public function search(Request $request) {
        $query = $request->input('searchString');
        $products = Product::where('name', 'like', "%$query%")
            ->orWhereHas('category', function ($q) use ($query) {
                $q->where('name', 'like', "%$query%");
            })
            ->get();

        return view('products.index', compact('products'));
    }

    public function index() {
        $products = $this->productRepository->getAll();
        return view('products.index', compact('products'));
    }

    public function create() {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(AddProductRequest $request) {
        $this->productRepository->createProduct($request->all());
        return redirect('/products')->with('success', 'Product created successfully');
    }

    public function edit($id) {
        $product = $this->productRepository->find($id);
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id) {
        $this->productRepository->updateProduct($id, $request);
        return redirect('/products')->with('success', 'Product updated successfully');
    }

    public function destroy($id) {
        $this->productRepository->deleteProduct($id);
        return redirect('/products')->with('success', 'Product deleted successfully');
    }
}
