<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->role === 'admin') {
            $users = User::all();
            $products = Product::all();
            $orders = Order::with('orderItems.product')->get();  
        
            return view('dashboard', compact('users', 'products', 'orders'));
        }

        $cartItems = auth()->user()->cart()->get();
        $orders = []; 

        return view('dashboard', compact('cartItems', 'orders'));  // Fixed syntax
    }
}