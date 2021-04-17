<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class CartController extends Controller
{
    public function index(){
        $items =  \Cart::session($_COOKIE['cart_id'])->getContent();
        $cart_items=array();
        foreach($items as $row) {
            $product = Product::where('id',$row->id)->first();
            $cart_items[$row->id]=array($product,$row->quantity,$product->new_price ? $product->new_price :  $product->price);
        }

        return view('cart.index',[
            'cart_items' => $cart_items
        ]);
    }

    public function addToCart(Request $request){
        $product = Product::where('id',$request->id)->first();

        if(!isset($_COOKIE['cart_id'])) setcookie('cart_id',uniqid());
        $cart_id = $_COOKIE['cart_id'];
        \Cart::session($cart_id);

      //  $rowId = 456; // generate a unique() row ID
        $userId = $cart_id;
        //$id=$request->post('id');
        $count=$request->post('count');
        \Cart::session($userId)->add(array(
            'id' => $product->id,
            'name' => "0",
            'price' =>  $product->new_price ? $product->new_price :  $product->price,
            'quantity' => $count,
            'attributes' => array(),
            'associatedModel' => null
        ));
        return response()->json(\Cart::getContent());
    }

    public function getCart(){
        $items = \Cart::getContent();

    }
}
