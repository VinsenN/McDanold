@extends('template.layout')

@section('content')
    <div class="mx-auto mt-5 w-50">
        <div class="container">
            <form class="py-3">
                <div class="mb-3 fw-bold text-center">
                    Login Form
                </div>
                <div class="mb-3">
                    <label for="emailInput" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="emailInput" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="passInput" class="form-label">Password</label>
                    <input type="password" class="form-control" id="passInput">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <div>
                Doesn't have account? <a href="/register">Join us now</a>
            </div>
        </div>
    </div>
@endsection
