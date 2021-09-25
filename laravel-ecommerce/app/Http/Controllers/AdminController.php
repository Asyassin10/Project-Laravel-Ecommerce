<?php

namespace App\Http\Controllers;

use App\Models\batata;
use App\Models\Order;
use App\Models\Prouduct;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function index()
    {
        $product = Prouduct::all();
        $order = Order::all();
        return view("admin.index")->with('product', $product)->with('order', $order);
    }


    public function adminLogout()
    {
        auth()->guard("admin")->logout();
        return redirect()->route("admin.login");
    }
    public function guard()
    {
        return Auth::guard('admin');
    }
    public function getproducts()
    {
        $product =  Prouduct::latest()->paginate(5);
        return view("admin.products.index")->with("products", $product);
    }
    public function getorder()
    {
        $order = Order::latest()->paginate(10);
        return view("admin.order.index")->with("orders", $order);
    }
}