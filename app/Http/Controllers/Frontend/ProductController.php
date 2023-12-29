<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public static $product = [
        ["id"=>"1","name"=>"TV","description"=>"Best TV","image"=>"game.png","price"=>"1000"],
        ["id"=>"2","name"=>"iPhone","description"=>"Best iPhone","image"=>"safe.png","price"=>"999"],
        ["id"=>"3","name"=>"Chromecast","description"=>"Best Chromecast","image"=>"submarine.png","price"=>"30"],
        ["id"=>"4","name"=>"Glass","description"=>"Best Glass","image"=>"game.png","price"=>"100"],
    ];

    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Product - Online Shopping";
        $viewData["subtitle"] = "List of Product";
        $viewData["products"] = ProductController::$product;
        return view('frontend.product.index')->with("viewData",$viewData);
    }

    public function show($id)
    {
        $viewData = [];
        $product = ProductController::$product[$id-1];
        $viewData["title"] = $product["name"]."- Online Shopping";
        $viewData["subtitle"] = $product["name"]."- Product information";
        $viewData["products"] = $product;
        return view('frontend.product.show')->with("viewData",$viewData);
    }
}
