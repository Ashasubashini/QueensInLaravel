<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $users = User::where('user_id', Auth::id())->get();
        return view('admindashboard', compact('users'));
    }
    public function showDashboard()
    {
        $orders = Order::all(); 
        return view('admin.dashboard', compact('orders'));
    }
}