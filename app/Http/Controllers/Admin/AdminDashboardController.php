<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $checkouts = Checkout::all();
        return view('admin.checkout.index', compact('checkouts'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
