<?php

namespace App\Http\Controllers;

use App\Models\Claimlist;
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
        if(Auth::user()->isAdmin() || Auth::user()->isOffice()){
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
        if(Auth::user()->isAdmin() || Auth::user()->isOffice()){
            return view('claims.create');
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
    public function store(Request $request)
    {
        if(Auth::user()->isAdmin() || Auth::user()->isOffice()){
           $claim = new Claimlist();
        $claim->warranty_id = $request->input('serial_number');
        $claim->date = Carbon::now()->format('Y-m-d');
        $claim->status = $request->input('status');
        $claim->damage = $request->input('damage');
        $claim->save();
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
        if(Auth::user()->isAdmin() || Auth::user()->isOffice()){
             $claimlist = Claimlist::with('warranty')->findOrFail($id);
        return view('claims.show',[
            'claimlist' => $claimlist
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
        if(Auth::user()->isAdmin() || Auth::user()->isOffice()){
            $claimlist = Claimlist::findOrFail($id);
        $statuses = Claimlist::$statuses;
        $this->authorize('update', $claimlist);
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
        if(Auth::user()->isAdmin() || Auth::user()->isOffice()){
            $claimlist = Claimlist::findOrFail($id);
        $this->authorize('update', $claimlist);
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
