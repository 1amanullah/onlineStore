<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData ['title'] = "Home Page - Online Shopping";
        return view('frontend.home.index')->with("viewData",$viewData);
    }

    public function about()
    {
        $data1 = "About us - Online Shopping";
        $data2 = "About us";
        $description = "This is an about us description";
        $author = "Amanullah Nilger";
        return view('frontend.home.about')->with("title",$data1)
        ->with("subtitle",$data2)
        ->with("description",$descriptioin)
        ->with("author",$author);
    }
}
