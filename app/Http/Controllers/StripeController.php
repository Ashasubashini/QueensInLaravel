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

        // Fetch the product details
        $product = Product::find($request->input('product_id'));

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found');
        }

        $quantity = $request->input('quantity', 1); // Default to 1 if not provided

        // Create the Stripe Checkout session
        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $product->name,
                    ],
                    'unit_amount' => $product->price * 100,
                ],
                'quantity' => $quantity,
            ]],
            'mode' => 'payment',
            'success_url' => route('success'),
            'cancel_url' => route('cancel'),
        ]);

        return redirect()->away($session->url);
    }

    public function success()
    {
        return view('index');
    }
}
