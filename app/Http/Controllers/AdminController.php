<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::with('listings')->paginate(10);

        return Inertia::render('Admin/AdminDashboard', [
            'users' => $users,
            'status' => session('status')
        ]);
    }

    public function role(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|string'
        ]);

        $user->update(['role' => $request->role]);

        return redirect()->route('admin.index')->with('status', "Role updated to {$request->role}!");
    }
}
