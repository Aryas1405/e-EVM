@extends('layouts.master')

@section('content')
<div class="jumbotron" style="background-color:white;">
    <h1 style="text-align:center">-Candidates-</h1>
    
    <a  href="{{route('candidates.create')}}" class="btn btn-info" style="margin-left:900px;margin-top:-48px;">Add Candidate</a>
   
    <table class="table table-striped">
    <tr>
    <th>Name</th>
    <th>Party</th>
    <th>Area</th> 
    <th>Action</th>
    </tr>
    @foreach($candidates as $candidate)
    
    <tr>    
    <td>{{ $candidate->name}}</td>
    
    <td>{{ $candidate->party}}</td>
    <td>{{ $candidate->district->name}}</td>
    
    <td class="form-group row">

   
   <a href="{{route('candidates.edit',$candidate)}}"><button class="btn btn-warning"style="margin-left:10px;">Edit</button></a>

<form action="{{route('candidates.destroy',$candidate)}}" method="post">
   @csrf
   @method('delete')
    <button type="submit" class="btn btn-danger"style="margin-left:10px;">Delete</button></td>
    </form>
   


    </tr>
    @endforeach
    </table>

    </div>
    @endsection