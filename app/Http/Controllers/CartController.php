<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    // Add to cart
    public function addToCart(Request $request)
    {
        Log::info('Add to Cart request received', ['request_data' => $request->all()]);

        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1|max:3'
        ]);

        $user = Auth::user();
        if (!$user) {
            Log::warning('Unauthorized access attempt to add to cart');
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        Log::info('User authenticated', ['user_id' => $user->id]);

        // Check if product exists in cart
        $cartItem = Cart::where('user_id', $user->id)
                        ->where('product_id', $request->product_id)
                        ->first();

        if ($cartItem) {
            Log::info('Updating cart item quantity', ['cart_item_id' => $cartItem->id, 'new_quantity' => $cartItem->quantity + $request->quantity]);
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } else {
            Log::info('Adding new item to cart', ['user_id' => $user->id, 'product_id' => $request->product_id, 'quantity' => $request->quantity]);
            Cart::create([
                'user_id' => $user->id,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Added to cart successfully'
        ]);
    }

    // Show cart items
    public function showCart()
    {
        Log::info('Cart fetch request received');

        $user = Auth::user();
        if (!$user) {
            Log::warning('Unauthorized access attempt to view cart');
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $cartItems = Cart::where('user_id', $user->id)
                        ->with('product')
                        ->get();

        Log::info('Cart items retrieved successfully', ['user_id' => $user->id, 'cart_items_count' => count($cartItems)]);

        return response()->json([
            'success' => true,
            'cart_items' => $cartItems
        ]);
    }

    // Remove item from cart
    public function removeFromCart($id)
    {
        Log::info('Remove from cart request received', ['cart_item_id' => $id]);

        $user = Auth::user();
        if (!$user) {
            Log::warning('Unauthorized access attempt to remove item from cart');
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $cartItem = Cart::where('id', $id)
                        ->where('user_id', $user->id)
                        ->first();

        if ($cartItem) {
            Log::info('Removing item from cart', ['cart_item_id' => $cartItem->id]);
            $cartItem->delete();
            return response()->json([
                'success' => true,
                'message' => 'Item removed from cart'
            ]);
        }

        Log::warning('Attempted to remove non-existing cart item', ['cart_item_id' => $id]);
        return response()->json([
            'success' => false,
            'error' => 'Item not found in cart'
        ], 404);
    }
}
