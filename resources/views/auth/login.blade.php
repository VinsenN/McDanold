@extends('template.layout')

@section('content')
    <div class="mx-auto mt-5 w-50">
        <div class="container">
            <form method="POST" enctype="multipart/form-data" action="{{ Route('guest.LoginData') }}" class="py-3">
                @csrf
                @if (session()->has('success'))
                    <div class="alert alert-success text-center" role="alert">
                        <span class="fw-bold"> {{ session()->get('success') }} </span>
                    </div>
                @endif

                @error('invalidCred')
                    <div class="alert alert-danger text-center" role="alert">
                        <span class="fw-bold">Login Failed: </span><span class="fw-semibold">Incorrect Email or
                            Password</span>
                    </div>
                @enderror

                <div class="mb-3 fw-bold text-center">
                    Login Form
                </div>
                <div class="mb-3">
                    <label for="emailInput" class="form-label">Email address</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror @error('invalidCred') is-invalid @enderror" id="emailInput"
                        aria-describedby="emailHelp" name="email"
                        value="{{ Cookie::get('last_email_log') ? Cookie::get('last_email_log') : '' }}">
                    @error('email')
                        <p class="text-danger">{{ $errors->first('email') }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="passInput" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror @error('invalidCred') is-invalid @enderror" id="passInput"
                        name="password" value="{{ Cookie::get('last_pass_log') ? Cookie::get('last_pass_log') : '' }}">
                    @error('password')
                        <p class="text-danger">{{ $errors->first('password') }}</p>
                    @enderror
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="rememberMe">
                    <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <div>
                Don't have account? <a href="/register">Join us now</a>
            </div>
        </div>
    </div>
@endsection
