<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class StripeController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function checkout(Request $request)
    {
        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        // Assuming you pass the product ID from the front end to identify which product to fetch
        $productId = $request->input('product_id');
        $product = Product::find($productId);

        if (!$product) {
            // Handle the case when the product is not found
            return redirect()->route('index')->with('error', 'Product not found');
        }

        $_session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $product->name,
                    ],
                    'unit_amount' => $product->price * 100, // Convert to cents
                ],
                'quantity' => 1, // You can update this with the actual quantity from the request
            ]],
            'mode' => 'payment',
            'success_url' => route('success'),
            'cancel_url' => route('cancel'),
        ]);

        return redirect()->away($_session->url);
    }

    public function success()
    {
        return view('index');
    }
}
