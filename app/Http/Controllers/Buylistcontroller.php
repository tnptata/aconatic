<?php

namespace App\Http\Controllers;

use App\Models\Buylist;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Buylistcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            if (!Auth::user()->isCustomer()) {
                $buylists = Buylist::where('delivered', 'false')->oldest('buy_date')->get();
                return view('buylists.index', ['buylists' => $buylists]);
            }else{ 
                $user = User::with('buylists')->findOrFail(Auth::user()->id);
                $buylists =  $user->buylists;
                return view('buylists.index', ['buylists' => $buylists]);
            }
        }else{ 
            abort(403, 'Unauthorized action.');
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function history()
    {
        if (Auth::check()) {
            if (!Auth::user()->isCustomer()) {
                $buylists = Buylist::where('delivered', 1)->latest('buy_date')->get();
                return view('buylists.history', ['buylists' => $buylists]);
            }
        }else{
            abort(403, 'Unauthorized action.');
        }
    }
    public function deliver($id)
    {
        $buylist = Buylist::findOrFail($id);
        $buylist->delivered = true;
        $buylist->deliver_date = Carbon::now()->format('Y-m-d');
        $buylist->save();
        return redirect()->route('buylists.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buylists = Buylist::where('delivered', 1)->latest('buy_date')->get();
        return view('buylists.history', ['buylists' => $buylists]);
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
     * @param  \App\Models\Buylist  $buylist
     * @return \Illuminate\Http\Response
     */
    public function show(Buylist $buylist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Buylist  $buylist
     * @return \Illuminate\Http\Response
     */
    public function edit(Buylist $buylist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Buylist  $buylist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Buylist $buylist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Buylist  $buylist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buylist $buylist)
    {
        //
    }
}
