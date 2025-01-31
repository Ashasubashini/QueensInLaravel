<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all(); // Fetch all products from the database
        return view('home', compact('products')); // Pass products to the view
    }

    // Inner Page: Show single product details
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('product.show', compact('product'));
    }
    public function showProducts() {
        $products = Product::all();  // Fetch all products from the database
        return view('admin.dashboard', compact('products'));  // Pass products to the view
    }
    public function edit($id)
    {
        $product = Product::findOrFail($id);  // Get the product by id
        return view('product.edit', compact('product'));    
    }
    public function updateProduct(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // Validate request
        $request->validate([
            'name' => 'required|string|max:255',
            'small_description' => 'nullable|string',
            'large_description' => 'nullable|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($product->image) {
                Storage::delete('public/' . $product->image);
            }

            // Store new image in 'storage/app/public/products'
            $imagePath = $request->file('image')->store('products', 'public');

            // Save new image path
            $product->image = $imagePath;
        }

        // Update product details
        $product->update($request->except('image'));

        return redirect()->route('admin.productList')->with('success', 'Product updated successfully');
    }
    public function removeProduct($id)
    {
        // Find the product by its ID
        $product = Product::find($id);

        if ($product) {
            // Delete the product
            $product->delete();

            // Optionally, return a success message or redirect
            return redirect()->route('admin.products')->with('success', 'Product removed successfully.');
        }

        // If the product wasn't found
        return redirect()->route('admin.products')->with('error', 'Product not found.');
    }
}
