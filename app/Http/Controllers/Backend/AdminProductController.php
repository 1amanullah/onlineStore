<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
class AdminProductController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            "name"=>"required|max:255",
            "description"=>"required",
            "price"=>"required|numeric|gt:0",
            "image"=>"image",
        ]);
      
        $newProduct = new Product();
        // $newProduct->setName($request->input('name'));
        // $newProduct->setDescription($request->input('description'));
        // $newProduct->setPrice($request->input('price'));
        // $newProduct->setImage('game.png');
        // $newProduct->save();

        
        $newProduct->name = $request->name;
        $newProduct->description = $request->description;
        $newProduct->price = $request->price;
        // $newProduct->save();

        // $newProduct->save();
        
        // Storage::disk('public')->put(
        //   $imageName,
        //   file_get_contents($request->file('image')->getRealPath())
        // );


      if($request->hasFile('image'))
      {
        $imageName = $newProduct->id.'.'.$request->file('image')->extension();
        $request->file('image')->storeAs('public',$imageName);
        $newProduct->image = $imageName;
        $newProduct->save();
        // dd($newProduct->toArray());
                  
      }
      else
      {
       return back()->withErrors(['image'=>'image field is required.']);
      }
        return back();
    }

    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Products - Online Store";
        $viewData["products"] = Product::all();
        return view('backend.product.index')->with('viewData',$viewData);
    }
}
