<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Prouduct;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        //show product
        return view('home')->with([
            'products' => Prouduct::latest()->paginate(10),
            'categories' => Category::has('products')->get(),
        ]);
    }
    public function getProductsBycategpry($category_id)
    {
        $products = Prouduct::where('categories_id', $category_id)->get();
        //    $product = $category_id->products()->paginate(10);   {{ $products->links() }}
        $categories = Category::all();
        return view('home')->with('products', $products)->with('categories', $categories);
    }
}