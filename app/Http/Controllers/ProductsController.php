<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(10);

        return view("products.index", compact("products"));
    }

    /**
     * Show the form for creating a new resource
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("products.create");
    }

    /**
     * Store a newly created resource in storage
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Product::create(array_merge(
            $request->only("title", "description", "price", "quantity", "img_product_src"),
            [
                "user_id" => auth()->id()
            ]
        ));

        return redirect()->route("posts.index")
            ->withSuccess(__('Post created successfully.'));
    }

    /**
     * Display the specified resource
     * 
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view("products.edit", [
            "product" => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource
     * 
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view("products.edit", [
            "product" => $product
        ]);
    }

    /**
     * Update the specified resource in storage
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->only("title", "description", "price", "quantity", "img_product_src"));

        return redirect()->route("products.index")
            ->withSuccess(__('Post updated successfully.'));
    }

    /**
     * Remove the specified resource from storage
     * 
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product){
        $product->delete();

        return redirect()->route("products.index")
        ->withSuccess(__('Post deleted successfully.'));
    }
}
