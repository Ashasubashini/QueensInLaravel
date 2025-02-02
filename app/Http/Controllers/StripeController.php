<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use App\Models\Product;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use App\Models\Cart;

class StripeController extends Controller
{
    // Unified checkout method for both product and cart checkout
    public function checkout(Request $request)
    {
        Stripe::setApiKey(config('stripe.sk'));

        // Determine if it's a product or cart checkout
        if ($request->has('product_id')) {
            // Product checkout (either from product page or cart's "Buy Now" button)
            $product = Product::find($request->input('product_id'));

            if (!$product) {
                return redirect()->back()->with('error', 'Product not found');
            }

            $quantity = $request->input('quantity', 1);

            // Store product ID and quantity in session for success handling
            session(['product_id' => $product->id, 'quantity' => $quantity]);

            // Create the Stripe session for the product
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
        } elseif ($request->has('cart_item_id')) {
            // "Buy Now" for a specific product in the cart
            $cartItem = Cart::where('id', $request->input('cart_item_id'))
                ->where('user_id', auth()->id())
                ->with('product')
                ->first();

            if (!$cartItem) {
                return redirect()->back()->with('error', 'Cart item not found');
            }

            $product = $cartItem->product;

            if (!$product) {
                return redirect()->back()->with('error', 'Product not found');
            }

            // Store cart item ID and quantity in session for success handling
            session(['cart_item_id' => $cartItem->id, 'quantity' => $cartItem->quantity]);

            // Create the Stripe session for the product
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
                    'quantity' => $cartItem->quantity,
                ]],
                'mode' => 'payment',
                'success_url' => route('success'),
                'cancel_url' => route('cancel'),
            ]);
        } else {
            // Regular cart checkout (all items in the cart)
            $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();

            if ($cartItems->isEmpty()) {
                return redirect()->back()->with('error', 'Your cart is empty.');
            }

            // Prepare line items for Stripe
            $lineItems = [];
            foreach ($cartItems as $item) {
                $product = $item->product;

                if (!$product) {
                    continue;
                }

                $lineItems[] = [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => $product->name,
                        ],
                        'unit_amount' => $product->price * 100, // Convert to cents
                    ],
                    'quantity' => $item->quantity,
                ];
            }

            // Create the Stripe session for the cart
            $session = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => $lineItems,
                'mode' => 'payment',
                'success_url' => route('success'),
                'cancel_url' => route('cart.index'),
            ]);

            // Store cart items in the session for later use (e.g., clearing the cart after payment)
            session(['cart_items' => $cartItems]);
        }

        // Redirect the user to the Stripe Checkout page
        return redirect()->away($session->url);
    }
    // Unified success method for both product and cart success
    public function success()
    {
        // Check if it's a product checkout or cart checkout
        if (session('product_id') && session('quantity')) {
            // Product checkout success (from product page)
            $productId = session('product_id');
            $quantityPurchased = session('quantity');

            $product = Product::find($productId);

            if ($product) {
                // Update product quantity
                $product->quantity -= $quantityPurchased;
                $product->save();
            }

            // Clear session data
            session()->forget(['product_id', 'quantity']);
        } elseif (session('cart_item_id') && session('quantity')) {
            // "Buy Now" success for a specific product in the cart
            $cartItemId = session('cart_item_id');
            $quantityPurchased = session('quantity');

            $cartItem = Cart::where('id', $cartItemId)
                ->where('user_id', auth()->id())
                ->with('product')
                ->first();

            if ($cartItem) {
                $product = $cartItem->product;

                if ($product) {
                    // Update product quantity
                    $product->quantity -= $quantityPurchased;
                    $product->save();
                }

                // Remove the cart item from the database
                $cartItem->delete();
            }

            // Clear session data
            session()->forget(['cart_item_id', 'quantity']);
        } elseif (session('cart_items')) {
            // Regular cart checkout success
            $cartItems = session('cart_items');

            // Clear the cart items from the database
            if ($cartItems) {
                foreach ($cartItems as $item) {
                    $product = $item->product;

                    if ($product) {
                        // Update product quantity
                        $product->quantity -= $item->quantity;
                        $product->save();
                    }
                }

                // Clear the cart items from the database
                Cart::where('user_id', auth()->id())->delete();
            }

            // Clear the session data
            session()->forget('cart_items');
        }

        // Load the success view
        return view('success');
    }
}