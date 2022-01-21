<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ConfigWeb;
use Illuminate\Http\Request;
use App\Models\CategoryProduct;

class FrontProductController extends Controller
{
    public function index(){
        $title_page = 'Product';
        $config = ConfigWeb::all()->first();
        $category = CategoryProduct::all();
        $product = Product::all();
        
        return view('frontend.product.index', compact('title_page','config', 'category','product'));
    }
    
    public function detailProduct($slug){
        $title_page = 'Product detail';
        $config = ConfigWeb::all()->first();

        $product = Product::where('slug', $slug)->firstOrFail();
        
        return view('frontend.product.detail', compact('title_page','config','product'));

    }
}
