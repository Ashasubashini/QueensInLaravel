<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all(); 
        return view('home', compact('products')); 
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('product.show', compact('product'));
    }
    public function showProducts() {
        $products = Product::all();  
        return view('admin.dashboard', compact('products'));  
    }
    public function edit($id)
    {
        $product = Product::findOrFail($id);  
        return view('product.edit', compact('product'));    
    }
    public function updateProduct(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'small_description' => 'nullable|string',
            'large_description' => 'nullable|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::delete('public/' . $product->image);
            }

            $imagePath = $request->file('image')->store('products', 'public');

            $product->image = $imagePath;
        }

        $product->update($request->except('image'));

        return redirect()->route('admin.productList')->with('success', 'Product updated successfully');
    }
    public function removeProduct($id)
    {
        $product = Product::find($id);

        if ($product) {
            $product->delete();

            return redirect()->route('admin.products')->with('success', 'Product removed successfully.');
        }

        return redirect()->route('admin.products')->with('error', 'Product not found.');
    }
    public function store(Request $request)
    {
        // Validate the incoming data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'small_description' => 'required|string',
            'large_description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product_images', 'public');
        } else {
            $imagePath = null; 
        }

        // Create the new product
        Product::create([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'quantity' => $validated['quantity'],
            'small_description' => $validated['small_description'],
            'large_description' => $validated['large_description'],
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.products')->with('success', 'Product added successfully');
    }
}
