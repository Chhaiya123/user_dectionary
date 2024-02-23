@extends('welcome')
@section('user')
<div class="col-12 col-md-4"> 
    <div class="card p-3">
        <img src="" class="card-img-top" alt="...">

        <div class="card-body">
            <h5 class="card-title">{{$data->name}}</h5>
            <p class="card-text small">{{$data->birth}}</p>
            <p class="card-text">{{$data->bio}}</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
</div>

@endsection