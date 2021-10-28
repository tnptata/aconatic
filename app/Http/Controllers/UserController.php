<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function addMoney()
    {
        if (Auth::check()) {
            if (Auth::user()->isCustomer()) {
                return view('customers.money');
            }
        }
    }

    public function money(CustomerRequest $request)
    {
        if (Auth::check()) {
            if (Auth::user()->isCustomer()) {
                $user = Auth::user();
                $users = User::findOrFail($user->id);
                $users->add_money += $request->input('add_money');
                $users->save();
                return redirect()->route('indexcustomer');
            }
        }
    }

    public function updateMoney($id)
    {
        if (Auth::check()) {
            if (Auth::user()->isAdmin()) {
                $users = User::findOrFail($id);
                $users->money += $users->add_money;
                $users->add_money = 0;
                $users->save();
                return redirect()->route('adminMoney');
            }
        }
    }

    public function deniedMoney($id)
    {
        if (Auth::check()) {
            if (Auth::user()->isAdmin()) {
                $users = User::findOrFail($id);
                $users->add_money = 0;
                $users->save();
                return redirect()->route('adminMoney');
            }
        }
    }

    public function adminMoney()
    {
        if (Auth::check()) {
            if (Auth::user()->isAdmin()) {
                $users = User::where('role', 'CUSTOMER')->get();
                return view('admin.add-money', ['users' => $users]);
            }
        }
    }
}
