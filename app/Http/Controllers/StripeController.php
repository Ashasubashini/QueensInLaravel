<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use App\Models\Product;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;

class StripeController extends Controller
{
    public function checkout(Request $request)
    {
        Stripe::setApiKey(config('stripe.sk'));

        // Check for product purchase
        if ($request->has('product_id')) {
            $product = Product::find($request->input('product_id'));

            if (!$product) {
                return redirect()->back()->with('error', 'Product not found');
            }

            $quantity = $request->input('quantity', 1);

            session(['product_id' => $product->id, 'quantity' => $quantity]);

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
        }
        // Check for cart item purchase
        elseif ($request->has('cart_item_id')) {
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

            session(['cart_item_id' => $cartItem->id, 'quantity' => $cartItem->quantity]);

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
        }
        // Check for multiple cart items
        else {
            $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();

            if ($cartItems->isEmpty()) {
                return redirect()->back()->with('error', 'Your cart is empty.');
            }

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
                        'unit_amount' => $product->price * 100, 
                    ],
                    'quantity' => $item->quantity,
                ];
            }

            $session = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => $lineItems,
                'mode' => 'payment',
                'success_url' => route('success'),
                'cancel_url' => route('cart.index'),
            ]);

            session(['cart_items' => $cartItems]);
        }

        return redirect()->away($session->url);
    }

    // Handle successful payment
    public function success()
    {
        if (session('product_id') && session('quantity')) {
            $productId = session('product_id');
            $quantityPurchased = session('quantity');
            $product = Product::find($productId);

            if ($product) {
                $order = Order::create([
                    'user_id' => auth()->id(),
                    'total_amount' => $product->price * $quantityPurchased,
                    'status' => 'completed',
                ]);

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $quantityPurchased,
                    'price' => $product->price,
                ]);

                $product->quantity -= $quantityPurchased;
                $product->save();
            }

            session()->forget(['product_id', 'quantity']);
        } elseif (session('cart_item_id') && session('quantity')) {
            $cartItemId = session('cart_item_id');
            $quantityPurchased = session('quantity');
            $cartItem = Cart::where('id', $cartItemId)
                ->where('user_id', auth()->id())
                ->with('product')
                ->first();

            if ($cartItem) {
                $product = $cartItem->product;

                if ($product) {
                    // Create the order
                    $order = Order::create([
                        'user_id' => auth()->id(),
                        'total_amount' => $product->price * $quantityPurchased,
                        'status' => 'completed',
                    ]);

                    // Create the order item
                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $product->id,
                        'quantity' => $quantityPurchased,
                        'price' => $product->price,
                    ]);

                    // Update product quantity
                    $product->quantity -= $quantityPurchased;
                    $product->save();
                }

                $cartItem->delete();
            }

            session()->forget(['cart_item_id', 'quantity']);
        } elseif (session('cart_items')) {
            $cartItems = session('cart_items');

            // Create the order
            $order = Order::create([
                'user_id' => auth()->id(),
                'total_amount' => $cartItems->sum(function ($item) {
                    return $item->product->price * $item->quantity;
                }),
                'status' => 'completed',
            ]);

            // Create the order items
            foreach ($cartItems as $item) {
                $product = $item->product;

                if ($product) {
                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $product->id,
                        'quantity' => $item->quantity,
                        'price' => $product->price,
                    ]);

                    // Update product quantity
                    $product->quantity -= $item->quantity;
                    $product->save();
                }
            }

            Cart::where('user_id', auth()->id())->delete();

            session()->forget('cart_items');
        }

        return view('success');
    }
}
