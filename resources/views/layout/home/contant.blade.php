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
                    <span class="badge bg-danger rounded-pill" style="opacity: 0.4;">FR</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <p class="text-row">{{$dt->word_km}}</p>
                    <span class="badge bg-primary rounded-pill" style="opacity: 0.4;">KM</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <p class="text-row">{{$dt->word_en}}</p>
                    <span class="badge bg-success rounded-pill" style="opacity: 0.4;">EN</span>
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
                        <div class="accordion" id="accordionExample{{$dt->word_id}}">
                            <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    {{ $dt->word }} <span class="text-light bg-danger ms-2 small badge rounded-pill">French</span>
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample{{$dt->word_id}}">
                                <div class="accordion-body">
                                    <p>{{ $dt->description }}</p>
                                </div>
                            </div>
                            </div>
                            <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    {{ $dt->word_km  }} <span class="text-light bg-primary ms-2 small badge rounded-pill">Khmer</span>
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample{{$dt->word_id}}">
                                <div class="accordion-body">
                                    <p>{{ $dt->description_km }}</p>
                                </div>
                            </div>
                            </div>
                            <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    {{ $dt->word_en }} <span class="text-light bg-success ms-2 small badge rounded-pill">Khmer</span>
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample{{$dt->word_id}}">
                                <div class="accordion-body">
                                    <p>{{$dt->description_en}}</p>
                                </div>
                            </div>
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