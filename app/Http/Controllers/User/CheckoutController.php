<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;

use function PHPUnit\Framework\isNull;

class CheckoutController extends Controller
{

    public function index(){
        $carts = Cart::where('user_id',Auth::id())->whereNotNull('order_id')->get();
        return view('user.checkout.index', compact('carts'));
    }
    public function create(){
        return view('user.checkout.create');
    }

    public function store(Request $request)
   {
    $checkout= new Checkout;
    $checkout['name'] = $request->name;
    $checkout['email'] = $request->email;
    $checkout['phone'] = $request->phone;
    $checkout['payment_name'] = $request->payment_name;
    $checkout['payment_number'] = $request->payment_number;
    $checkout['payment_secret'] = $request->payment_secret;
    $checkout['location'] = $request->location;
    $checkout['user_id'] = Auth::id();
    $checkout['description'] = $request->description;
  $checkout->save();
  foreach (Cart::item_cart() as $cart) {
          $cart['order_id']=$checkout->id;
          $cart->save();
  }
    return redirect('/');
   }
}
