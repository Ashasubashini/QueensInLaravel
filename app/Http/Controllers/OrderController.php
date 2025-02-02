<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('orderItems.product')->get();
        \Log::info($orders);

        return view('admin.orders.index', compact('orders'));
    }
    public function show(Order $order)
    {
        return view('admin.orders.show', compact('order'));
    }
}