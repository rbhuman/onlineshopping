<?php

namespace App\Http\Controllers;


use App\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        $products=Product::all();
        return view('front.home',[
           'products'=>$products
        ]);
    }
    public function products(){
        $products=Product::all();
        return view('front.products',[
            'products'=>$products
        ]);
    }
    public function product(){
        return view('front.product');
    }
}
