<?php

namespace App\Http\Controllers;

use App\Election;
use App\Voter;
use App\Candidate;
use Illuminate\Http\Request;

class ElectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function voter_login()
    {
        return view('Election.voter_login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function auth_voter(Request $request)
    {
        $id=$request->aadhar;
        $dob=$request->dob;
        $voter=Voter::where('aadhar',$id)->first();
        if($voter)
        {
            if($voter->status==1)
            {
                if($voter->dob==$dob)
                {
                    return redirect()->route('elections.cast_vote',$voter);
                }
                else
                {
                    return view('Election.voter_login')->with('danger', 'Invalid aadhar or dob');
                }
            }
            else
            {
                return 'Your Vote Has Already Submitted !!, Come Again in 2025 Election. Thank You';
               
            }
        }
        else
        {
            return view('Election.voter_login')->with('danger', 'Invalid aadhar or dob');
        }
       
        
    }
       
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Display the specified resource.
     *
     * @param  \App\Election  $election
     * @return \Illuminate\Http\Response
     */
    public function cast_vote(Voter $voter)
    {
       
        $candidates=Candidate::all();
        if($voter->status==1)
        {
        return view('Election.cast_vote')->withCandidates($candidates)->withVoter($voter);
        }
        else
        {
            return redirect('/')->with('danger','Your Vote Has Already Submitted !!, Come Again in 2025 Election. Thank You'); 
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Election  $election
     * @return \Illuminate\Http\Response
     */
    public function save_vote(Candidate $candidate,Voter $voter)
    {
     
       
        if($voter->status==1)
        {
        $voter->status=$voter->status + 1;
        $voter->save();
        $candidate->count = 1 + $candidate->count;
        $candidate->save();
        return redirect('/')->with('success','You have Successfully Voted!!');
        }
        else
        {
        return redirect('/')->with('danger','You have Already Voted!!');
        }
        
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Election  $election
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Election $election)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Election  $election
     * @return \Illuminate\Http\Response
     */
    public function destroy(Election $election)
    {
        //
    }
}
