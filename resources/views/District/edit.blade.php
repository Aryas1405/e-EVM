@extends('layouts.master')

@section('content')
    <div class="jumbotron">

    <form class="form-inline" method="post" action="{{route('districts.update',$district)}}">
    @csrf()
    @method('put')
  <div class="form-group mx-sm-3 mb-2">
    <input type="text" class="form-control"  value="{{$district->name}}" name="name">
@error('name')
<small class="form-text text-danger">{{$message}}</small>
@enderror
  </div>
  <button class="btn btn-primary mb-2">Update District</button>
  <a  href="{{route('districts.index')}}" class="btn btn-info mb-2" style="margin-left:15px;">Show Disrtricts</a><br>  

</form>
    </div>
    @endsection