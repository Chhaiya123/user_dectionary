@extends('welcome')
@section('login_register')
<div class="col-12 col-md-6 m-auto">
    <div class="card px-4 py-5">
        <form class="row g-3 needs-validation" novalidate action="{{route('store')}}" method="post">
            @csrf
            <h1>Register</h1>
            <div class="col-md-12">
                <label for="validationCustom01" class="form-label">Full Name</label>
                <input type="text" class="form-control" name="name" id="validationCustom01" value="" required placeholder="Name">
                @if ($errors->has('name'))
                    <small class="text-danger w-100">{{ $errors->first('name') }}</small>
                @endif
            </div>
            <div class="col-md-12">
                <label for="validationCustomUsername" class="form-label">Username</label>
                <input type="email" class="form-control" name="email" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required placeholder="Email">                 
                @if ($errors->has('email'))
                    <small class="text-danger w-100">{{ $errors->first('email') }}</small>
                @endif
            </div>
            <div class="col-md-12">
                <label for="validationCustomPassword" class="form-label">Password</label>
                
                <input type="password" class="form-control" name="password" id="validationCustomPassword" aria-describedby="inputGroupPrepend" required placeholder="Password">
                @if ($errors->has('password'))
                    <small class="text-danger w-100">{{ $errors->first('password') }}</small>
                @endif
            </div>
            <div class="col-md-12">
                <label for="validationCustomRePassword" class="form-label">Repeat password</label>
                <div class="input-group has-validation">
                    <input type="password" class="form-control" name="password_confirmation" id="repass" aria-describedby="inputGroupPrepend" required placeholder="Re-Password">
                </div>
            </div>
           
            
            <div class="col-12 text-end">
                <button class="btn btn-primary px-4 my-3" type="submit">Create</button>
                <br>
                <a class="link" href="{{route('login')}}">Do you have accrount? Login</a>
            </div>
        </form>
    </div>
</div>

@endsection