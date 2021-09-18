<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\PreOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PreOrderController extends Controller
{
    public function index(){
       $preOrders = PreOrder::where('user_id', Auth::id())->get();
       return view('user.preOrder.index', compact('preOrders'));
    }

    public function create()
    {
        return view('user.preOrder.create');
    }

    public function store(Request $request)
    {
        $preOrder = new PreOrder;
        $preOrder->name = $request->name;
        $preOrder->phone = $request->phone;
        $preOrder->email = $request->email;
        $preOrder->user_id = Auth::id();
        $preOrder->note = $request->note;
        $preOrder->save();
        return redirect('/');
    }
}
