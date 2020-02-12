@extends('layouts.master')

@section('content')
    <div class="jumbotron">

    <form class="form-inline" method="get" action="{{route('candidates.result')}}">
    @csrf()
    <div class="form-group row">
        <label class="col-sm-2 col-form-label" style="margin-left:">District</label>
        <div class="col-sm-10" >
            <select class="js-example-basic-multiple" name="district" style="width:100%">
            <option disabled selected >--Select District--</option>
           @foreach($districts as $district)
         
            <option value="{{$district->id}}">{{$district->name}}</option>
           @endforeach
            </select>
        <div><br>
        <button type="submit" class="btn btn-success">See Result</button>
    </div>
    
</form>
    </div>
    @endsection