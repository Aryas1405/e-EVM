@extends('layouts.master')

@section('content')
<div class="jumbotron" style="background-color:white;">
    <h1>All districts</h1>
    <a  href="{{route('districts.create')}}" class="btn btn-info" style="margin-left:900px;margin-top:-48px;">Create New district</a>
    <table class="table table-striped">
   
    <tr>
    <th>Name</th>
    <th>Candidate</th>
    <th>Action</th>

    </tr>
    @foreach($districts as $district)
    
    <tr>    
    <td>{{ $district->name }}</td>
    <td>
    @foreach($district->candidates as $candidate)
    @if($candidate->count()>0)
    -{{ $candidate->name}}-({{$candidate->party}})</br>
    @else
    No Candidate
    @endif
    @endforeach
    </td>
    
    <td class="form-group row">
   
    <a href="{{route('districts.edit',$district)}}"><button class="btn btn-warning"style="margin-left:10px;">Edit</button></a>
<form action="{{route('districts.destroy',$district)}}" method="post">
   @csrf
   @method('delete')
    <button type="submit" class="btn btn-danger"style="margin-left:10px;">Delete</button></td>
    </form>


    </tr>
    @endforeach
    </table>
  
    </div>

    @endsection