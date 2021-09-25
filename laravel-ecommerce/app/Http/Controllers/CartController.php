<?php

namespace App\Http\Controllers;

use App\Models\Category;


use App\Models\Prouduct;
//use Cart;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function index()
    {

        $product =  Prouduct::all();
        $items =  Cart::content();
        return view('cart.index')->with('items', $items);
    }
    public function addtocart(Request $request, $product_id)
    {
        $prouduct = Prouduct::find($product_id);
        $prouduct_slug = $prouduct->in_stock;
        $product_id = $prouduct->product_id;
        $picture = $prouduct->picture;
        $price = $prouduct->price;
        $product_name = $prouduct->product_name;
        $qty = $request->qty;
        Cart::add(['id' => $product_id, 'name' => $product_name, 'qty' => $qty, 'price' => $price, 'options' => array('image' => $prouduct->picture, 'in_stock' => $prouduct->in_stock, 'prouduct' => $prouduct->product_id, 'desc' => $prouduct->description)]);
        return redirect()->route('cart.index');
    }

    public function updatecart(Request $request, $rowId)
    {

        Cart::update($rowId, ['qty' => $request->qty]);
        return redirect()->route('cart.index');
    }
    public function removecart($rowId)
    {
        Cart::remove($rowId);
        return redirect()->route('cart.index');
    }
}