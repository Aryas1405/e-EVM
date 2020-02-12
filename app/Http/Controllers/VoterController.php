<?php

namespace App\Http\Controllers;

use App\Voter;
use App\District;
use Illuminate\Http\Request;

class VoterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {$districts=District::all();
        $voters=Voter::all();
        return view('Voter.index')->withVoters($voters)->withDistricts($districts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $districts=District::all();
        return view('Voter.create')->withDistricts($districts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $voter=new Voter;
        $voter->name=$request->name;
        $voter->aadhar=$request->aadhar;
        $voter->dob=$request->dob;
        $voter->district_id=$request->area;
        $voter->save();
        return redirect()->route('voters.index')->with('success', 'Voter Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Voter  $voter
     * @return \Illuminate\Http\Response
     */
    public function show(Voter $voter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Voter  $voter
     * @return \Illuminate\Http\Response
     */
    public function edit(Voter $voter)
    {
        $districts=District::all();
        return view('Voter.edit')->withVoter($voter)->withDistricts($districts);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Voter  $voter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Voter $voter)
    {
        $voter->name=$request->name;
        $voter->aadhar=$request->aadhar;
        $voter->dob=$request->dob;
        $voter->district_id=$request->area;
        $voter->save();
        return redirect()->route('voters.index')->with('success', 'Voter Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Voter  $voter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Voter $voter)
    {
        $voter->delete();
        return redirect()->route('voters.index')->with('success', 'Voter Deleted Successfully');
    }
}
