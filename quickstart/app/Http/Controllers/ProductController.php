<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $product = Product::where([
            ['product_name', '=', $request->product_name],
            ['category_id', '=', $request->category_id],
        ])->first();

        if ($product != null) {
            $product->amount += $request->amount;
            $product->product_desc = $request->product_desc;
            $product->price = $request->price;
            $product->update();
        } else {
            Product::create($request->all());
        }

        return redirect()->route('products.index')->with('noti', __('notiAddPs'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();

        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Product $product)
    {
        $productFind = Product::where([
            ['product_name', '=', $request->product_name],
            ['category_id', '=', $request->category_id],
        ])->get();

        if ($productFind != null) {
            return redirect()->route('products.index')->with('fail', __('updateFail'));
        } else {
            $product->update($request->all());

            return redirect()->route('products.index')->with('noti', __('notiUpPs'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('noti', __('notiDelPs'));
    }
}
