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
        $newProduct->setName($request->input('name'));
        $newProduct->setDescription($request->input('description'));
        $newProduct->setPrice($request->input('price'));
        $newProduct->setImage('game.png');
        $newProduct->save();

        if($request->hasFile('image'))
        {
          $imageName = $newProduct->getId(). '.' .$request->file('image')->e;xtention();
          Storage::disk('public')->put(
            $imageName,
            file_get_contents($request->file('image')->getRealPath())
          );
          $newProduct->setImage($imageName);
          $newProduct->save();
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
