@extends('layouts.master')

@section('content')

<div class="jumbotron">
<form method='POST' action="{{route('voters.store')}}">
@csrf()

<h3 style="margin-top:-60px;">Add New Voter For Election</h3>
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
    <label class="col-sm-2 col-form-label">Aadhar No.</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" placeholder="Add a Aadhar No. Here..." name="aadhar" >
      @error('title')
      <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
      @enderror
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">DOB</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" placeholder="ddmmyyyy" name="dob" >
      @error('title')
      <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
      @enderror
    </div>
  </div>
  <div class="form-group row">
        <label class="col-sm-2 col-form-label" style="margin-left:">Select Area</label>
        <div class="col-sm-10" >
            <select class="js-example-basic-multiple" name="area" style="width:100%">
           
            <option disabled selected>--Select District--</option>
                    @foreach($districts as $district)
                <option value="{{ $district->id }}">{{ $district->name }}
                </option>
                @endforeach
                </select>
        <div>
    </div>
    <br>
  <button type="submit" class="btn btn-success" style="">Add Voter</button>
<a href="{{route('voters.index')}}" class="btn btn-outline-success" style="">Back to all Candidtes</a>

</form>
</div>



@endsection