<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Warranty;
use App\Models\Buylist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\BuyRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            $products = Product::latest('created_at')->get();
            return view('products.index', ['products' => $products]);
        }else{
            abort(403, 'Unauthorized action.');
        }
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::check()){
            $product_types = Product::$product_types;
            return view('products.create', ['product_types' => $product_types]);
        }else{
            abort(403, 'Unauthorized action.');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        if(Auth::check()){
            $product = new Product();
            $product->name = $request->input('name');
            $product->cost = $request->input('cost');
            $product->detail = $request->input('detail');
            $product->type = $request->input('type');
            if ($request->hasFile('product_image')) {
                $file = $request->file('product_image');
                $extention = $file->getClientOriginalExtension();
                $filename = time().'.'.$extention;
                $file->move('uploads/products/', $filename);
                $product->product_image = $filename;
            }
            $product->save();
            return redirect()->route('products.index');
        }else{
            abort(403, 'Unauthorized action.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Auth::check()){
            $product = Product::findOrFail($id);
            $products = Product::latest('created_at')->get();
            return view('products.show', ['product' => $product],['products' => $products]);
        }else{
            abort(403, 'Unauthorized action.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::check()){
            $product = Product::findOrFail($id);

            return view('products.edit', [
                'product' => $product
            ]);
        }else{
            abort(403, 'Unauthorized action.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        if(Auth::check()){
            $product = Product::findOrFail($id);

            $product->name= $request->input('name');
            $product->cost = $request->input('cost');
            $product->detail = $request->input('detail');
            if ($request->hasFile('product_image')) {
                $destination = 'uploads/products/'.$product->product_image;
                if(File::exists($destination))
                {
                    File::delete($destination);
                }           
                $file = $request->file('product_image');
                $extention = $file->getClientOriginalExtension();
                $filename = time().'.'.$extention;
                $file->move('uploads/products/', $filename);
                $product->product_image = $filename;
            }
            $product->save();
            return redirect()->route('products.show', ['product' => $id]);
        }else{
            abort(403, 'Unauthorized action.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    




    public function grouptelevision()
    {
        if(Auth::check()){
            $products = Product::latest('cost')->get();
            return view('products.grouptelevision', ['products' => $products]);
        }else{
            abort(403, 'Unauthorized action.');
        }
    }

    public function groupspeaker()
    {
        if(Auth::check()){
            $products = Product::latest('cost')->get();
            return view('products.groupspeaker', ['products' => $products]);
        }else{
            abort(403, 'Unauthorized action.');
        }
    }

    public function groupportair()
    {
        if(Auth::check()){
            $products = Product::latest('cost')->get();
            return view('products.groupportair', ['products' => $products]);
        }else{
            abort(403, 'Unauthorized action.');
        }
    }

    public function groupcamera()
    {
        if(Auth::check()){
            $products = Product::latest('cost')->get();
            return view('products.groupcamera', ['products' => $products]);
        }else{
            abort(403, 'Unauthorized action.');
        }
    }



    
    
}
