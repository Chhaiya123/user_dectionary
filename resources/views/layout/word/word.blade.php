@extends('welcome')
@section('contant')
<div class="col-12 {{ request()->is('word') ? 'col-md-12' : '' }}">
    
    <div class="row g-3">
        <div class="col-12">
            <div class="border-none  pb-3">
                <div >
                    <h6 class="h5 my-0 py-0">FILTER</h6><br>
                    <form action="{{url('word.search')}}" class="w-100">
                        <div class="row">
                            <div class="col col-md-3">
                                <div class="form-item">
                                    <input type="text" value="{{Auth::user() ? $search : '' }}" class="form-control p-2 rounded-0" name="search" placeholder="Search Word ...">
                                </div>
                            </div>
                            <div class="col col-auto">
                                <button type="submit" class="btn btn-primary float-end text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                                  </svg></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @if(request()->is('word'))
            @forelse( $data_word as $dt )
            <div class="col-12 col-md-6 col-lg-4 col-xl-3">
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
            <div class="modal fade px-0" id="exampleModal{{$dt->word_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-fullscreen-md-down modal-dialog-scrollable modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Word </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            {{-- ==== --}}
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
                            {{-- ==== --}}
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
            <div class="mt-2">
                <div class="row">
                    <div class="col">
                        <p class="small h-100 d-flex align-items-center">Showing {{ $data_word->firstItem() }} to {{ $data_word->lastItem() }} of {{ $data_word->total() }} results.</p>
                    </div>
                    <div class="col">
                        <nav class="Page navigation example justify-content-end d-flex">
                            <ul class="pagination d-flex gap-0">
                                @if ($data_word->currentPage() >= 1)
                                <li class="page-item {{$data_word->currentPage() <= 1 ? 'disabled' :''}}">
                                    <a class="page-link" href="{{ $data_word->previousPageUrl() }}">Previous</a>
                                </li>
                                @endif
                    
                                @for ($i = 1; $i <= $data_word->lastPage(); $i++)
                                    <li class="page-item {{ ($data_word->currentPage() == $i) ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $data_word->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor
                    
                                @if ($data_word->currentPage() <= $data_word->lastPage())
                                    <li class="page-item {{$data_word->currentPage() < $data_word->lastPage() ? '' : 'disabled'}}">
                                        <a class="page-link d-block" href="{{ $data_word->nextPageUrl() }}">Next</a>
                                    </li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        @else
        {{-- = search = --}}
            @forelse( $filter_word as $dt )
            <div class="col-12 col-md-6 col-lg-4 col-xl-3">
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
        @endif
    </div>  
   
</div>

@endsection