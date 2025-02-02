<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        
        try {
            // Attempt to retrieve orders with their associated order items and products
            $orders = Order::with('orderItems.product')->get();
    
            // Return the orders to the view
            return view('admin.orders.index', compact('orders'));
    
        } catch (\Exception $e) {
            // Log the error message along with the exception details
            Log::error('Failed to retrieve orders: ' . $e->getMessage(), [
                'exception' => $e,
                'trace' => $e->getTraceAsString(),
            ]);
    
            // Optionally, redirect back with an error message
            return back()->with('error', 'Something went wrong while retrieving orders.');
        }
    }
    public function show(Order $order)
    {
        return view('admin.orders.show', compact('order'));
    }
}