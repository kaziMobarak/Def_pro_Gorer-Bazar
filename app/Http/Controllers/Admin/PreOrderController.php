<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PreOrder;
use Illuminate\Http\Request;

class PreOrderController extends Controller
{
    public function index()
    {
        $preOrders = PreOrder::all();
        return view('admin.preOrder.index', compact('preOrders'));
    }
}
