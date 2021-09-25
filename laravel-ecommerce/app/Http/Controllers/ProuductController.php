<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Prouduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;


class ProuductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product =  Prouduct::latest()->paginate(10);
        $categories = Category::has('products')->get();
        return view('home')->with('product', $product)
            ->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view("admin.products.create")->with(
            "categories",
            $categories
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $this->validate($request, [
            "product_name" => "required|min:3",
            "description" => "required|min:5",
            "picture" => "required|image|mimes:png,jpg,jpeg|max:10048",
            "price" => "required|numeric",
            "in_stock" => "required|numeric",
            "categories_id" => "required",
        ]);

        //add data
        $product = new Prouduct();
        if ($request->has("picture")) {
            $file = $request->picture;
            $pictureName = "images/products/" . time() . "_" . $file->getClientOriginalName();
            $file->move(public_path("images/products"), $pictureName);
            $product->picture = $pictureName;
            $title = $request->product_name;
            Prouduct::create([
                "product_name" => $title,
                "description" => $request->description,
                "price" => $request->price,
                "old_price" => $request->old_price,
                "in_stock" => $request->in_stock,
                "categories_id" => $request->categories_id,
                "picture" => $pictureName,
            ]);
            return redirect()->route("admin.products")
                ->withSuccess("Product added");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prouduct  $prouduct
     * @return \Illuminate\Http\Response
     */
    public function show($product_id)
    {

        $data = Prouduct::where('product_id', $product_id)
            //->join('categories', 'prouducts.product_id', '=', 'categories.category_id')
            ->first();
        //return $data;
        return view('products.show')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     * !@#$%^&*()|}}:><<M||}}{}
     *
     * @param  \App\Models\Prouduct  $prouduct
     * @return \Illuminate\Http\Response
     */
    public function edit($product_id)
    {
        $product = Prouduct::find($product_id);
        $categories = Category::all();
        return view("admin.products.edite")->with(
            "product",
            $product
        )->with("categories", $categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prouduct  $prouduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //validation
        $this->validate($request, [
            "product_name" => "required|min:3",
            "description" => "required|min:5",
            "picture" => "image|mimes:png,jpg,jpeg|max:2048",
            "price" => "required|numeric",
            "categories_id" => "required",
        ]);
        $product = Prouduct::find($id);
        //update data
        if ($request->has("picture")) {
            $picture_path = public_path("images/products/" . $product->picture);
            if (File::exists($picture_path)) {
                unlink($picture_path);
            }
            $file = $request->picture;
            $pictureName = "images/products/" . time() . "_" . $file->getClientOriginalName();
            $file->move(public_path("images/products"), $pictureName);
            $product->picture = $pictureName;
        }

        $title = $request->product_name;
        $product->update([
            "product_name" => $title,
            "description" => $request->description,
            "price" => $request->price,
            "old_price" => $request->old_price,
            "in_stock" => $request->in_stock,
            "categories_id" => $request->categories_id,
            "picture" => $product->picture,
        ]);
        return redirect()->route("admin.products")
            ->withSuccess("Product updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prouduct  $prouduct
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_id)
    {
        $product = Prouduct::find($product_id);
        $product->delete();
        return redirect()->back();
    }
}