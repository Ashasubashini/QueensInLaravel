<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->role === 'admin') {
            $users = User::all();
            return view('dashboard', compact('users'));
        }
        $cartItems = auth()->user()->cart()->get();
        return view('dashboard', compact('cartItems'));
    }
}
