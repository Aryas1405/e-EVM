<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\Party;
use App\District;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function resultDistrict()
    {
        $districts=District::all();
        return view('Candidate.resultDistrict')->withDistricts($districts);
    }
    public function result(Request $request)
    {
        $candidates=Candidate::all();
        $distid=$request->district;
        return view('Candidate.result')->withDistid($distid)->withCandidates($candidates);
    }
    public function index()
    {
        $candidates=Candidate::all();
        return view('Candidate.index')->withCandidates($candidates);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $districts=District::all();
        $parties=Party::all();
        return view('Candidate.create')->withParties($parties)->withDistricts($districts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $candidate=new Candidate;
        $candidate->name=$request->name;
        $candidate->party=$request->party;
        $candidate->district_id=$request->area;
 
        $candidate->save();
        return redirect()->route('candidates.index')->with('success', 'Candidate Created Successfully');
   }

    /**
     * Display the specified resource.
     *
     * @param  \App\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function show(Candidate $candidate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidate $candidate)
    {
        $districts=District::all();
        $parties=Party::all();
        return view('Candidate.edit')->withCandidate($candidate)->withParties($parties)->withDistricts($districts);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Candidate $candidate)
    {
        $candidate->name=$request->name;
        $candidate->party=$request->party;
        $candidate->district_id=$request->area;
 
        $candidate->save();
        return redirect()->route('candidates.index')->with('success', 'Candidate Updated Successfully');
   
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidate $candidate)
    {
        $candidate->delete();
        return redirect()->route('candidates.index')->with('success', 'Candidate Deleted Successfully');
    }

  
}
