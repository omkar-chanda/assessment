<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        /** get All Products */
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function product_view(Request $request, $id) {
        /** get product by ID */
        $product = Product::find($id);
        return view('products.product_view', compact('product'));
    }
}
