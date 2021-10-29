<?php

namespace App\Http\Controllers;

use App\Models\Claimlist;
use App\Models\Receipt;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests\ClaimlistRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ClaimlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            $claimlists = Claimlist::with('warranty')->get();
        return view('claims.index',['claimlists' => $claimlists]);
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
        return view('claims.create');

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::check()){
            $claim = new Claimlist();
            $claim->warranty_id = $request->input('serial_number');
            $claim->date = Carbon::now()->format('Y-m-d');
            $claim->status = $request->input('status');
            $claim->damage = $request->input('damage');
            $claim->save();
            if($claim->status == "รอชำระ"){
                $receipt = new Receipt();
                $receipt->expense = $request->input('cost');
                $receipt->claimlist_id= $claim->id;
                $receipt->save();
            }
            return redirect()->route('claims.show', ['claim'=> $claim->id]); 
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
            $claimlist = Claimlist::with('warranty')->findOrFail($id);
            $receipt = Receipt::where('claimlist_id', $id)->first();
            if($receipt == null){
                return view('claims.show',[
                    'claimlist' => $claimlist,
                    'status' => "free"
                ]);
            }

            return view('claims.show',[
                'claimlist' => $claimlist,
                'status' => "charge",
                'receipt' => $receipt
            ]);
        }else{
            abort(403, 'Unauthorized action.');
        }
       
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::check()){
            $claimlist = Claimlist::findOrFail($id);
            $statuses = Claimlist::$statuses;
            return view('claims.edit', [
                'claimlist' => $claimlist,
                'statuses' => $statuses
            ]);

        }else{
            abort(403, 'Unauthorized action.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ClaimlistRequest  $request
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ClaimlistRequest $request, $id)
    {
        if(Auth::check()){
            $claimlist = Claimlist::findOrFail($id);
            $claimlist->status = $request->input('status');
            $claimlist->damage = $request->input('damage');
            $claimlist->repair_condition = $request->input('repair_condition');
            $claimlist->save();
            return redirect()->route('claims.show', ['claim' => $id]);
        }else{
            abort(403, 'Unauthorized action.');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Claimlist  $claimlist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Claimlist $claimlist)
    {
        //
    }

    
}
