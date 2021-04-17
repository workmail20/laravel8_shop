<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $products = Product::orderBy('created_at')->take(8)->get();
/*        $products = Product::all();
        foreach ($products as $product){
            echo 'Title: '.$product->title;
            echo "<br>";
            echo 'Price: '.$product->price;
            echo "<br>";
            echo "-----------------------";
            echo "<br>";
        }

        return view('home.index');*/

       // dd($products);
        return view('home.index',[
            'products' => $products
        ]);
    }
}
