<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function brand_ways_product($id)
    {
        $products = Product::where('brand_id', $id)->get();
        return view('user.brand.all_product', compact('products'));
    }
}
