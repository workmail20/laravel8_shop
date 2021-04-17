<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;

class ProductController extends Controller
{
    public function showProduct($cat, $product_id)
    {
        $item = Product::where('id', $product_id)->first();
        $categories = Category::all();

        return view('product.show', [
            'item' => $item
        ]);
    }

    public function showCategory($cat_alias)
    {
         $request = null;
        $cat = Category::where('alias', $cat_alias)->first();
        $categories = Category::all();

        $products = Product::where('category_id', $cat->id)->paginate(2);

        if (isset($request->orderBy)) {
            if ($request->orderBy == 'price-low-high') {
                $products = Product::where('category_id', $cat->id)->orderBy('price')->get();
            }
            if ($request->orderBy == 'price-high-low') {
                $products = Product::where('category_id', $cat->id)->orderBy('price', 'desc')->get();
            }
            if ($request->orderBy == 'name-a-z') {
                $products = Product::where('category_id', $cat->id)->orderBy('title')->get();
            }
            if ($request->orderBy == 'name-z-a') {
                $products = Product::where('category_id', $cat->id)->orderBy('title', 'desc')->get();
            }
        }

        if (isset($request->orderBy))
        if ($request->ajax()) {
            return view('ajax.order-by', [
                'products' => $products
            ])->render();
        }

        return view('product.category', [
            'item' => $cat,
            'products' => $products
        ]);
    }
}
