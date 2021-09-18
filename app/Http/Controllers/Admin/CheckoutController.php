<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Checkout;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $checkouts = Checkout::all();
        return view('admin.checkout.index', compact('checkouts'));
    }

    public function status($id)
    {
        $status = Checkout::find($id);
        if($status->status == 1){
            $status['status'] = 0;
            $status->save();
            return back();
        }else{
            $status['status'] = 1;
            $status->save();
            return back();
        }
    }

    public function destroy($id)
    {
        Checkout::find($id)->delete();
        return back();
    }

    public function detail($id)
    {
        $checkout = Checkout::find($id);
        return view('admin.checkout.detail', compact('checkout'));
    }

    public function quantity(Request $request, $id)
    {
        $quantity = Cart::find($id);
        $quantity['quantity'] = $request->quantity;
        $quantity->save();
        return back();
    }
}
