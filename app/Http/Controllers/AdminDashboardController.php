<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $cartItems = User::where('user_id', Auth::id())->get();
        return view('admindashboard', compact('users'));
    }
}