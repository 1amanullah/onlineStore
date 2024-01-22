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
        Product::validate($request);

        $newProduct = new Product();

        $newProduct->name = $request->name;
        $newProduct->description = $request->description;
        $newProduct->price = $request->price;

      //image upload
      if($request->hasFile('image'))
      {
        $imageName = $newProduct->id.'.'.$request->file('image')->extension();
        $request->file('image')->storeAs('public',$imageName);
        $newProduct->image = $imageName;
        $newProduct->save();
                  
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

  public function delete($id)
  {
     Product::destroy($id);
     return back();
  }

  public function edit($id)
  {
    $viewData = [];
    $viewData["title"] = "Admin Page - Edit Product - Online Store";
    $viewData["product"] = Product::findOrFail($id);
    return view('backend.product.edit')->with("viewData",$viewData);
  }

  public function update(Request $request,$id)
  {

    Product::validate($request);

     $product = Product::findOrFail($id);
     $product->name = $request->name;
     $product->description = $request->description;
     $product->price = $request->price;

     if($request->hasFile('image'))
     {
       $imageName = $product->id.'.'.$request->file('image')->extension();
       $request->file('image')->storeAs('public',$imageName);
       $product->image = $imageName;
     }
     $product->save();
    return redirect()->route('admin.product.index');

  }
}
