@extends('welcome')
@section('contant')

<div class="container-fluid">
    <div class="container">
        {{-- <div class="col-md-12 col-lg-6 col-xl-7 m-auto bg-danger">
            @if($errors->any()) 
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    @foreach($errors->all() as $error)
                        រូបភាពត្រូវមានទំហំតូចជាង 3MB
                    @endforeach
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div> --}}
        <div class="col-md-12">
            <form class="needs-validation" novalidate action="{{url('uploads/'.Auth::user()->id)}}"  id="yourForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row g-5">
                    <div class="col-md-12 col-lg-6 col-xl-7 m-auto">
                    <h1 class="mb-4 ">Edit Your Profile</h1>
                        <div class="form-item">
                            <label class="form-label my-3">Name<sup>*</sup></label>
                            <input  type="text" class="form-control fouse rounded-0" name="name" value="{{$data->name}}" placeholder="Your Name" required>
                        </div>
                        <div class="form-item">
                            <label class="form-label my-3">Date Of Birth<sup>*</sup></label>
                            <input type="date" name="birth" value="{{$data->birth}}" class="form-control rounded-0">
                        </div>
                        <div class="form-item">
                            <label class="form-label my-3">Bio</label>
                            <textarea name="bio" class="form-control rounded-0" spellcheck="false" cols="30" rows="5" placeholder="Your Message ..." required>{{$data->bio}}</textarea>
                        </div>

                        <div class="form-item my-3">
                            <label class="form-label my-3">Picture</label>
                            <input type="file" name="image" @if($errors->any()) @foreach($errors->all() as $error) autofocus @endforeach  @endif class="form-control rounded-0 @if($errors->any()) @foreach($errors->all() as $error) is-invalid @endforeach  @endif">
                            <span class="small @if($errors->any()) @foreach($errors->all() as $error) text-danger @endforeach  @endif">
                                រូបភាពត្រូវមានទំហំតូចជាង 3MB
                            </span>
                        </div>
                        
                        <div class="form-item">
                            <button type="submit" class="btn btn-primary text-white">Submit</button>
                            <a href="{{route('profile')}}" class="btn btn-danger text-white">Cancel</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


    


@endsection