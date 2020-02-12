@extends('layouts.master')

@section('content')
<div class="jumbotron">
<form method='POST' action="{{route('parties.update',$party)}}">
@csrf()
@method('put')

<h3 style="margin-top:-60px;">Edit Party</h3>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Title</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="{{$party->title}}" name="title" >
      @error('title')
      <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
      @enderror
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Discription</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"value="{{$party->description}}" name="description" >
      @error('title')
      <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
      @enderror
    </div>
  </div>

  <label class="col-sm-2 col-form-label">Election Sign:</label>
    <div class="col-sm-10">
      <input type="file"  name="image" style="margin-top:10px;">

    </div>
    
<button type="submit" class="btn btn-success" style="margin-left:900px;margin-top:10px;">Update Party</button>
<a href="{{route('parties.index')}}" class="btn btn-outline-success" style="margin-left:700px;margin-top:-36px;">Back to all Parties</a>


</form>
</div>
@endsection