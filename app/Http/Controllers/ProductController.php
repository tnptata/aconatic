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
        $product_status = Product::$product_status;
        return view('products.create', ['product_types' => $product_types],['product_status' => $product_status]);
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
        $product->amount = $request->input('amount');
        $product->detail = $request->input('detail');
        $product->type = $request->input('type');
        $product->status = $request->input('status');
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
        $product_status = Product::$product_status;
        $this->authorize('update', $product);
        return view('products.edit', [
            'product' => $product,
            'product_status' => $product_status
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
        $product->amount = $request->input('amount');
        $product->detail = $request->input('detail');
        $product->status = $request->input('status');
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

    
    public function home(){
        $products = Product::latest('created_at')->get();
        return view('home', ['products' => $products]);
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

    public function buy(BuyRequest $request, $id){
        $product = Product::find($id);
        return view('products.buy',[
            'product' => $product,
            'amount' => $request->input('amount')
        ]);
    }

    public function confirm($id, $cost){
        $user = User::findorFail(Auth::user()->id);
        $buylist = new Buylist();
        $product = Product::find($id);
        $amount = $cost/$product->cost;
        $product->amount -= $amount;
        $user->money -= $cost; 
        $product->save();
        $user->save();
        $buylist->user_id = $user->id;
        $buylist->product_id = $product->id;
        $buylist->buy_date = Carbon::now()->format('Y-m-d');
        $buylist->amount = $amount;
        $buylist->save();
        for($i = 0;$i<$cost/$product->cost;$i++){
            $warranty = new Warranty();
            $warranty->start_date = Carbon::now()->format('Y-m-d');
            $warranty->expire_date = Carbon::now()->addYears(1)->format('Y-m-d');
            $warranty->user_id = $user->id;
            $warranty->product_id = $product->id;
            $warranty->save();
        }
        return redirect()->route('home');
    }

    
    
}
