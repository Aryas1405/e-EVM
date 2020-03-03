@extends('layouts.master')

@section('content')
<div class="jumbotron" style="background-color:white;">
    <h1 style="text-align:center">-Result For {{$district->name}} Candidates-</h1>
    
    
    <table class="table table-striped">
    <tr>
    <th>Sign</th>
    <th>Name</th>
    <th>Party</th>
    <th>votes</th>
    </tr>
    @foreach($candidates as $candidate)
    @if($candidate->district_id==$distid)
    <tr>    
    <td>-pic-</td>
    <td>{{ $candidate->name}}</td>
    
    <td>{{ $candidate->party->title}}</td>
    <td>{{ $candidate->count }}</td>
   


    </tr>
    @endif
    @endforeach
    </table>

    </div>
    @endsection