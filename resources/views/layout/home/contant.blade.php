@extends('welcome')
@section('contant')

<div class="col-12 col-md-5 col-lg-4 "> 
    <div class="card p-3">
        <div class="card-profile">
            <img  src="{{Auth::User()->image ? '../../uploads/'.Auth::User()->image : '../../img/logo.jpg'}}" class="card-img-top" alt="...">
        </div>
        <div class="card-body">
            <h5 class="card-title">{{$data->name}}</h5>
            <p class="card-text small">{{$data->birth}}</p>
            <p class="card-text">{{$data->bio}}</p>
        </div>
    </div>
</div>
<div class="col-12 col-md-7 col-lg-8">
    <div class="row g-3">
        @forelse($data_word as $dt)
        <div class="col-12 col-md-6 col-lg-4" >
            <ul class="list-group" data-bs-toggle="modal" data-bs-target="#exampleModal{{$dt->word_id}}">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <p class="text-row">{{$dt->word}}</p>
                    <span class="badge small text-dark" style="opacity: 0.2;">FR</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <p class="text-row">{{$dt->word_km}}</p>
                    <span class="badge small text-dark" style="opacity: 0.2;">KM</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <p class="text-row">{{$dt->word_en}}</p>
                    <span class="badge small text-dark" style="opacity: 0.2;">EN</span>
                </li>
            </ul>
        </div>
        <!-- Modal -->
        <div class="modal fade ps-0" id="exampleModal{{$dt->word_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-fullscreen-md-down modal-dialog-scrollable modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Words </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card mb-2">
                            <div class="card-body">
                              <h6 class="card-title">{{ $dt->word }}</h6>
                              <p class="card-text">{{ $dt->description }}</p>
                            </div>
                        </div>
                        <div class="card mb-2">
                            <div class="card-body">
                              <h6 class="card-title">{{ $dt->word_km }}</h6>
                              <p class="card-text">{{ $dt->description_km }}</p>
                            </div>
                        </div>
                        <div class="card mb-2">
                            <div class="card-body">
                              <h6 class="card-title">{{ $dt->word_en }}</h6>
                              <p class="card-text">{{ $dt->description_en }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        @empty
            <li>No items found.</li>
        @endforelse
        <div>
            <a class="nav-link float-end " href="{{route('word')}}">Views all</a>
        </div>
    </div>
</div>


@endsection