<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($id){
        $item = Product::find($id);
        $attribute = ProductVariant::where('product_id', $id)->get();
        return view('user.product.detail', compact('attribute', 'item'));
    }

    public function search(Request $request)
    {
        $text= $request->search_key;
        $products = Product::where("name", "LIKE", "%{$text}%")->get();
        return view('user.product.search', compact('products'));

    }

    public function category_ways_product($id)
    {
        $products = Product::where('category_id', $id)->get();
        return view('user.product.search', compact('products'));

    }
}
