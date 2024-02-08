<?php

namespace App\Http\Controllers\Frontend;
use App\Models\Product;
use App\Models\Order;
use App\Models\Item;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $total = 0;
        $productsInCart = [];

        $productsInSession = $request->session()->get("products");
        if($productsInSession)
        {
            $productsInCart = Product::findMany(array_keys($productsInSession));
            $total = Product::sumPricesByQuantities($productsInCart,$productsInSession);
        }
 
        $viewData = [];
        $viewData["title"] = "Cart - online Shopping";
        $viewData["subtitle"] = "Shopping Cart";
        $viewData["total"] = $total;
        $viewData["products"] = $productsInCart;
        return view('frontend.cart.index')->with("viewData",$viewData);
    }

    public function add(Request $request,$id)
    {
        $products = $request->session()->get("products");
        $products[$id] = $request->input('quantity');
        $request->session()->put('products',$products);

        return redirect()->route('cart.index');
    }

    public function delete(Request $request)
    {
        $request->session()->forget('products');
        return back();
    }

    public function purchase(Request $request)
    {
        $productsInSession = $request->session()->get('products');
        if($productsInSession)
        {
            $userId = Auth::user()->id;
            $order = new Order();
            $order->userId;
            $order->total=0;
            $order->save();
            
            $total = 0;
            $productsInCart = Product::findMany(array_keys($productsInSession));
            foreach ($productsInCart as $product) 
            {
                $quantity = $productsInSession[$product->id];
                $item = new Item();
                $item->quantity;
                $item->product->price;
                $item->product->id;
                $item->order->id;
                $item->save();
                $total = $total + ($product->price*$quantity);
            }
            
            $order->total;
            $order->save();

            $newBalance = Auth::user()->balance-$total;
            Auth::user()->newBalance;
            Auth::user()->save();

            $request->session()->forget('products');

            $viewData = [];
            $viewData["title"] = "Purchase - Online Shopping";
            $viewData["subtitle"] = "Purchase Status";
            $viewData["order"] = $orde;
            return view('frontend.cart.purchase')->with('viewData',$viewData);
        }

        else
        {
            return redirect()->route('cart.index');
        }
    }
}






