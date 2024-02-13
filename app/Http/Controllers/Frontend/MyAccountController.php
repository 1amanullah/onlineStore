<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyAccountController extends Controller
{
    public function orders()
    {
        $viewData = [];
        $viewData['title'] =  "My Orders - Online Shopping";
        $viewData['subtitle'] = "My Orders";
        // $viewData['orders'] =   Order::where('user_id',Auth::user()->id)->get();
        $viewData['orders'] = Order::with(['items.product'])->where('user_id',Auth::user()->id)->get();  
        return  view('frontend.myaccount.orders')->with('viewData',$viewData);
    }
}
