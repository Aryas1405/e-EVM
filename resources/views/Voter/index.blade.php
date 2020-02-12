@extends('layouts.master')

@section('content')
<div class="jumbotron" style="background-color:white;">
    <h1 style="text-align:center">-Voters-</h1>
    
    <a  href="{{route('voters.create')}}" class="btn btn-info" style="margin-left:900px;margin-top:-48px;">Add Voter</a>
   
    <table class="table table-striped">
    <tr>
    <th>Name</th>
    <th>Aadhar</th>
    <th>DOB</th> 
    <th>Status</th>
    <th>Area</th>
    <th>Action</th>
    </tr>
    @foreach($voters as $voter)
    
    <tr>    
    <td>{{ $voter->name}}</td>
    
    <td>{{ $voter->aadhar}}</td>
    <td>{{ $voter->dob}}</td>
    <td>
    @if($voter->status==1)
    Not Voted
    @else
    Voted
    @endif
    </td>
    <td>
    @if($voter->district)
    {{ $voter->district->name}}
    @endif
    </td>

    
    <td class="form-group row">

   
   <a href="{{route('voters.edit',$voter)}}"><button class="btn btn-warning"style="margin-left:10px;">Edit</button></a>

<form action="{{route('voters.destroy',$voter)}}" method="post">
   @csrf
   @method('delete')
    <button type="submit" class="btn btn-danger"style="margin-left:10px;">Delete</button></td>
    </form>
   


    </tr>
    @endforeach
    </table>

    </div>
    @endsection