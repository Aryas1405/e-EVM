@extends('layouts.master')

@section('content')
<div class="jumbotron" style="background-color:white;">
    <h1 style="text-align:center">-Parties-</h1>
    
    <a  href="{{route('parties.create')}}" class="btn btn-info" style="margin-left:900px;margin-top:-48px;">Add party</a>
   
    <table class="table table-striped">
    <tr>
    <th>Party</th>
    <th>Sign</th>
    <th>Description</th> 
    <th>Action</th>
    </tr>
    @foreach($parties as $party)
    
    <tr>    
    <td>{{ $party->title}}</td>
    <td>-pic-</td>
    
    <td>{{ $party->description }}</td>
    
    <td class="form-group row">

   
   <a href="{{route('parties.edit',$party)}}"><button class="btn btn-warning"style="margin-left:10px;">Edit</button></a>

<form action="{{route('parties.destroy',$party)}}" method="post">
   @csrf
   @method('delete')
    <button type="submit" class="btn btn-danger"style="margin-left:10px;">Delete</button></td>
    </form>
   


    </tr>
    @endforeach
    </table>

    </div>
    @endsection