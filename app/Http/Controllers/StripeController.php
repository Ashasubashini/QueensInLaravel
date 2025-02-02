<?php

namespace App\Http\Controllers;
use Stripe\Stripe;
use App\Models\Product;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;

class StripeController extends Controller
{
    public function checkout(Request $request)
    {
        Stripe::setApiKey(config('stripe.sk'));

        // Retrieve the product based on the product ID
        $product = Product::find($request->input('product_id'));

        // Check if the product exists
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found');
        }

        // Retrieve the quantity from the request, default to 1 if not provided
        $quantity = $request->input('quantity', 1);
        $totalAmount = $product->price * $quantity; // Calculate total price based on quantity

        // Create a Stripe session
        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $product->name,
                    ],
                    'unit_amount' => $product->price * 100, // Convert to cents for Stripe (unit price for 1 item)
                ],
                'quantity' => $quantity, // Use the dynamic quantity value from the request
            ]],
            'mode' => 'payment',
            'success_url' => route('success'),
            'cancel_url' => route('cancel'),
        ]);

        // Redirect the user to the Stripe Checkout page
        return redirect()->away($session->url);
    }
    public function success()
    {
        return view('index');
    }
}
