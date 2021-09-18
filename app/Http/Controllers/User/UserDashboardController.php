<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $brands = Brand::all();
        return view('welcome', compact('products','brands'));
    }
}
