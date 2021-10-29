<?php

namespace App\Http\Controllers;

use App\Models\Warranty;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Claimlist;
use Illuminate\Http\Request;
use App\Http\Requests\WarrantyRequest;
use Illuminate\Support\Facades\Auth;

class WarrantyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            $warranties = Warranty::get();
        return view('warranties.index',['warranties' => $warranties]);
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
            return view('warranties.create');
        }else{
            abort(403, 'Unauthorized action.');
        }
    }




    public function createClaim($warranty_id){
        if(Auth::check()){
            $warranty = Warranty::where('serial_number',$warranty_id)->firstOrFail();
            return view('claims.create', ['warranty' => $warranty]);
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
    public function store(WarrantyRequest $request)
    {
        if(Auth::check()){
            $product = Product::where('name','=',$request->input('product'))->first();
            $customer = Customer::where('name','=',$request->input('name'))->first();
            if($product === null){
                return back()->with('productError','this product not found');
            }else{
                if($customer === null){
                    return back()->with('customerError','this customer not found');
                }else{
                    $warranty = new Warranty();
                    $warranty->product_id = $product->id;
                    $warranty->customer_id = $customer->id;
                    $warranty->start_date = $request->input('start_date');
                    $warranty->expire_date = $request->input('expire_date');
                    $warranty->save();
                    return redirect()->route('warranties.index'); 
                }
            }
        }else{
            abort(403, 'Unauthorized action.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Warranty  $warranty
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Auth::check()){
            $warranty = Warranty::where('serial_number',$id)->firstOrFail();
            return view('warranties.show',[
                'warranty' => $warranty
            ]);
        }else{
            abort(403, 'Unauthorized action.');
        }
    }

    public function check(Request $request)
    {
        if(Auth::check()){
            $warranty = Warranty::where('serial_number',$request->input('serial'))->first();
            if($warranty === null){
                return back()->with('notfound','this warranty is not found');
            }else{
                return view('warranties.show',[
                    'warranty' => $warranty
                ]);
            }
        }else{
            abort(403, 'Unauthorized action.');
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Warranty  $warranty
     * @return \Illuminate\Http\Response
     */
    public function edit(Warranty $warranty)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Warranty  $warranty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Warranty $warranty)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Warranty  $warranty
     * @return \Illuminate\Http\Response
     */
    public function destroy(Warranty $warranty)
    {
        //
    }
}
