@extends('layouts.master')

@section('content')

<div class="jumbotron">
<form method='POST' action="{{route('candidates.update',$candidate)}}">
@csrf()
@method('put')
<h3 style="margin-top:-60px;">Edit Candidate For Election</h3>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="{{$candidate->name}}" name="name" >
      @error('title')
      <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
      @enderror
    </div>
  </div>
  <div class="form-group row">
        <label class="col-sm-2 col-form-label">Select Party</label>
        <div class="col-sm-10" >

            <select class="js-example-basic-multiple" name="party" style="width:100%">
           @foreach($parties as $party)
            <option selected value="{{$party->title}}">{{$party->title}}</option>
            @endforeach
            </select>
        <div>
    </div>
    <br>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label" style="margin-left:-165px">Select Area</label>
        <div class="col-sm-10" >
        <select class="js-example-basic-multiple" name="area" style="width:100%">
        <option disabled>--Select District--</option>
                    @foreach($districts as $district)
                <option
                @if($candidate->area==$district->id)
                selected
                @endif
                 value="{{ $district->id }}">{{ $district->name }}
                </option>
                @endforeach
                </select>
        <div>
    </div>
    <br>
  <button type="submit" class="btn btn-success" style="">Update Candidate</button>
    <a href="{{route('candidates.index')}}" class="btn btn-outline-success" style="">Back to all Candidtes</a>

</form>
</div>



@endsection