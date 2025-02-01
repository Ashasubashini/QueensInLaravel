<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function index()
    {
        $products = Product::all(); 
        return view('index', compact('products'));    }

    public function checkout(Request $request)  
    {
        \Stripe\Stripe::setApiKey(config('stripe.sk'));


        $productIds = $request->input('product_ids'); 

        $products = Product::whereIn('id', $productIds)->get();

        if ($products->isEmpty()) {
            return redirect()->route('index')->with('error', 'Products not found');
        }

        $lineItems = [];
        foreach ($products as $product) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $product->name,
                    ],
                    'unit_amount' => $product->price * 100, 
                ],
                'quantity' => 1, 
            ];
        }

        // Create the Stripe Checkout session
        $_session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => $lineItems,
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
