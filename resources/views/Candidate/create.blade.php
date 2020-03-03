@extends('layouts.master')

@section('content')

<div class="jumbotron">
<form method='POST' action="{{route('candidates.store')}}">
@csrf()

<h3 style="margin-top:-60px;">Add New Candidate For Election</h3>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" placeholder="Add a Name Here..." name="name" >
      @error('title')
      <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
      @enderror
    </div>
  </div>
  <div class="form-group row">
        <label class="col-sm-2 col-form-label">Select Party</label>
        <div class="col-sm-10" >
            <select class="js-example-basic-multiple" name="party" style="width:100%">
            <option disabled selected >--Select Party--</option>
           @foreach($parties as $party)
            <option value="{{$party->id}}">{{$party->title}}</option>
            @endforeach
            </select>
        <div>
    </div>
    <br>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label" style="margin-left:-165px">Select Area</label>
        <div class="col-sm-10" >
            <select class="js-example-basic-multiple" name="area" style="width:100%">
            <option disabled selected >--Select District--</option>
           @foreach($districts as $district)
         
            <option value={{$district->id}}>{{$district->name}}</option>
           @endforeach
            </select>
        <div>
    </div>
    <br>
  <button type="submit" class="btn btn-success" style="">Add Candidate</button>
    <a href="{{route('candidates.index')}}" class="btn btn-outline-success" style="">Back to all Candidtes</a>

</form>
</div>



@endsection