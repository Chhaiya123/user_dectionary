@extends('welcome')
@section('login_register')
<div class="col-12 col-md-6 m-auto">
    <div class="card p-3">
        <form class="row g-3 needs-validation" novalidate method="POST" action="{{ url('authenticate') }}">
            @csrf
           <h1>Login </h1>
            <div class="col-md-12">
                <label for="validationCustomUsername" class="form-label">Username</label>
                <div class="input-group has-validation">
                    <span class="input-group-text rounded-0" id="inputGroupPrepend"><i class="bi bi-envelope"></i></span>
                    <input type="email" class="form-control" id="validationCustomUsername" name="email" aria-describedby="inputGroupPrepend" required placeholder="Email">
                    
                </div>
                @if ($errors->has('email'))
                    <small class="text-danger">{{ $errors->first('email') }}</small>
                @endif
            </div>
            <div class="col-md-12">
                <label for="validationCustomPassword" class="form-label">Password</label>
                <div class="input-group has-validation">
                    <span class="input-group-text rounded-0" id="inputGroupPrepend"><i class="bi bi-lock"></i></span>
                    <input type="password" class="form-control" id="validationCustomPassword" name="password" aria-describedby="inputGroupPrepend" required placeholder="Password">
               </div>
                @if ($errors->has('password'))
                    <small class="text-danger mb-3">{{ $errors->first('password') }}</small>
                @endif
            </div>
           
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Submit form</button>
                <a href="{{route('register')}}">Create Accrount</a>
            </div>
        </form>
    </div>
</div>

@endsection