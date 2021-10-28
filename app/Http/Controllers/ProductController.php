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
        //
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Product::class);
        $product_types = Product::$product_types;
        return view('products.create', ['product_types' => $product_types]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $this->authorize('create', Product::class);
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
        return redirect()->route('indexcustomer');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $products = Product::latest('created_at')->get();
        return view('products.show', ['product' => $product],['products' => $products]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $this->authorize('update', $product);
        return view('products.edit', [
            'product' => $product
        ]);
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
        
        $product = Product::findOrFail($id);
        $this->authorize('update', $product);
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('indexcustomer');
    }

    


    public function indexcustomer()
        {
            $products = Product::latest('created_at')->get();
            return view('products.indexcustomer', ['products' => $products]);
        }

    public function grouptelevision()
    {
        $products = Product::latest('cost')->get();
        return view('products.grouptelevision', ['products' => $products]);
    }

    public function groupspeaker()
    {
        $products = Product::latest('cost')->get();
        return view('products.groupspeaker', ['products' => $products]);
    }

    public function groupportair()
    {
        $products = Product::latest('cost')->get();
        return view('products.groupportair', ['products' => $products]);
    }

    public function groupcamera()
    {
        $products = Product::latest('cost')->get();
        return view('products.groupcamera', ['products' => $products]);
    }



    
    
}
