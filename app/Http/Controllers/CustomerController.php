<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;

use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            $customers = Customer::get();
        return view('customers.index',['customers' => $customers]);
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

        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
        if(Auth::check()){
            $customer = new Customer();
            $customer->name = $request->input('name');
            $customer->tel = $request->input('tel');
            $customer->email = $request->input('email');
            $customer->address = $request->input('address');
            $customer->save();
            return redirect()->route('customers.index');
        }else{
            abort(403, 'Unauthorized action.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Auth::check()){
            $customer = Customer::findOrFail($id);
            return view('customers.show',[
                'customer' => $customer,
                
            ]);
        }else{
            abort(403, 'Unauthorized action.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::check()){
            $customer = Customer::findOrFail($id);
            return view('customers.edit',['customer' => $customer]);
        }else{
            abort(403, 'Unauthorized action.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CustomerRequest  $request
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CustomerRequest $request, $id)
    {
        if(Auth::check()){
            $customer = Customer::findOrFail($id);
            $customer->name = $request->input('name');
            $customer->tel = $request->input('tel');
            $customer->email = $request->input('email');
            $customer->address = $request->input('address');
            $customer->save();
            return redirect()->route('customers.show', ['customer'=> $customer->id]);
        }else{
            abort(403, 'Unauthorized action.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
