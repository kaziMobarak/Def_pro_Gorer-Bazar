<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebSettingController extends Controller
{
    public function contact()
    {
        return view('contact');
    }

    public function about(){
        return view('about');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

}
