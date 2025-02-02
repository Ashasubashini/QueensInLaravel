<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showUsers()
    {
        $users = User::where('id', '!=', auth()->id())
                    ->where('role', '!=', 'admin')
                    ->get();
                    
        return view('admin.dashboard', compact('users'));
    }

    public function removeUser($id)
    {
        try {
            $user = User::where('role', '!=', 'admin')
                        ->findOrFail($id);
            
            $user->delete();
            return redirect()->back()->with('success', 'User removed successfully');
            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to remove user');
        }
    }
}
