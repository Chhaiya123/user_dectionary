@extends('welcome')
@section('contant')
    <div class="col-12 col-md-6 col-lg-5 col-xl-4 m-auto"> 
        <div class="card p-3 m-auto">
            {{-- <img src="{{Auth::User()->image ? '../../uploads/'.Auth::User()->image : '../../img/logo.jpg'}}" class="card-img-top" alt="..."> --}}
            <div class="card-profile">
                <img src="{{Auth::User()->image ? '../../uploads/'.Auth::User()->image : '../../img/logo.jpg'}}" class="img-fluid" alt="...">
            </div>
            <div class="card-body">
                <h5 class="card-title">{{$data->name}}</h5>
                <p class="card-text small">{{$data->birth}}</p>
                <p class="card-text">{{$data->bio}}</p>
                <a href="{{route('edit.profile')}}" class="btn btn-primary text-white">Edit</a>
            </div>
        </div>
    </div>
@endsection