
<html>
<head>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/b200a985f2.js" crossorigin="anonymous"></script>    
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

        <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
  
</head>
<body>
@if (session('danger'))
    <div class="alert alert-danger" role="alert">
        {{ session('danger') }}
    </div>
@endif
@if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif
<div class="jumbotron" style="background-color:white;">
<h3>Welcome '{{$voter->name}}' Please Vote Any candidate</h3>
    <h1 style="text-align:center">-Candidates-</h1>
    
   
   
    <table class="table table-striped">
    <tr>
    <th>Sign</th>
    <th>Name</th>
    <th>Party</th>
    <th>Action</th>
    </tr>
    @foreach($candidates as $candidate)
    @if($candidate->district_id==$voter->district_id)
    <tr>    
    <td>-pic-</td>
    <td>{{ $candidate->name}}</td>
    
    <td>{{ $candidate->party->title}}</td>

    
    <td class="form-group row">

    <form action="{{route('elections.save_vote',[$candidate,$voter])}}" method="post">
    @csrf
    @method('put')

    <button type="submit" class="btn btn-warning"style="margin-left:10px; border:1px solid green;border-radius:350px;">Vote</button></td>
    </form>
   


    </tr>
    @endif
    @endforeach
    </table>
    
    </div>
  </body>
  </head>