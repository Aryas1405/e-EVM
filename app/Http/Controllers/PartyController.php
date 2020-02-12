<?php

namespace App\Http\Controllers;

use App\Party;
use App\Candidate;
use Illuminate\Http\Request;

class PartyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parties=Party::all();
        return view('Party.index')->withParties($parties);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Party.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $party=new Party;
        $party->title=$request->title;
        $party->description=$request->description;
        $party->save();
        return redirect()->route('parties.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Party  $party
     * @return \Illuminate\Http\Response
     */
    public function show(Party $party)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Party  $party
     * @return \Illuminate\Http\Response
     */
    public function edit(Party $party)
    {
        return view('Party.edit')->withParty($party);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Party  $party
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Party $party)
    {
    
        $party->title=$request->title;
        $party->description=$request->description;
        $party->save();
        return redirect()->route('parties.index')->with('success', 'Party Successfully Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Party  $party
     * @return \Illuminate\Http\Response
     */
    public function destroy(Party $party)
    {
        $party->delete();
        return redirect()->route('parties.index')->with('success', 'Party Deleted');
    }
}
