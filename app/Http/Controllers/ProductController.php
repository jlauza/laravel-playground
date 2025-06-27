<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create() {
        return view('products.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        Product::create($validated);

        return redirect()->route('products.index')
                         ->with('success', 'Product created successfully.');
    }

    public function index() {
        $products = Product::all();
        return view('products.index', compact('products'));
    }
}
