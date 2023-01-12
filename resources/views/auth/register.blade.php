@extends('template.layout')

@section('content')
    <div class="mx-auto mt-5 w-50">
        <div class="container">
            <form method="POST" enctype="multipart/form-data" action="{{Route('guest.RegisterData')}}" class="py-3" >
                @csrf
                <div class="mb-3 fw-bold text-center">
                    Register Form
                </div>
                <div class="mb-3">
                    <label for="emailInput" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="emailInput" aria-describedby="emailHelp" name="email"
                        value="{{ @old('email') }}">
                    @if ($errors->first('email'))
                        <div class="text-danger">
                            <p>{{ $errors->first('email') }}</p>
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="nameInput" class="form-label">Name</label>
                    <input class="form-control" id="nameInput" name="name" value="{{ @old('name') }}">
                    @if ($errors->first('name'))
                        <div class="text-danger">
                            <p>{{ $errors->first('name') }}</p>
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="passInput" class="form-label">Password</label>
                    <div class="row g-2 align-items-center">
                        <div class="col-auto">
                            <input type="password" class="form-control" id="passInput" name="password">
                        </div>
                        <div class="col-auto">
                            <span id="passwordHelpInline" class="form-text" style="user-select: none;">
                                Must be 8-20 characters long.
                            </span>
                        </div>
                    </div>
                    @if ($errors->first('password'))
                        <div class="text-danger">
                            <p>{{ $errors->first('password') }}</p>
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="passInput" class="form-label">Password Confirmation</label>
                    <div class="row g-2 align-items-center">
                        <div class="col-auto">
                            <input type="password" class="form-control" id="passInput" name="password_confirmation">
                        </div>
                    </div>
                    @if ($errors->first('password_confirmation'))
                        <div class="text-danger">
                            <p>{{ $errors->first('password_confirmation') }}</p>
                        </div>
                    @endif
                </div>

                <div class="mb-3">
                    <label class="form-label">Gender</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="Male"
                            @if (old('gender') == 'Male') checked @endif>
                        <label class="form-check-label" for="male">
                            Male
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="female" value="Female"
                            @if (old('gender') == 'Female') checked @endif>
                        <label class="form-check-label" for="female">
                            Female
                        </label>
                    </div>
                    @if ($errors->first('gender'))
                        <div class="text-danger">
                            <p>{{ $errors->first('gender') }}</p>
                        </div>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="dob">Date of Birth: </label>
                    <input type="date" id="dob" name="date_of_birth" value="{{ @old('date_of_birth') }}">
                    @if ($errors->first('date_of_birth'))
                        <div class="text-danger">
                            <p>{{ $errors->first('date_of_birth') }}</p>
                        </div>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Register</button>
            </form>
            <div>
                Already have an account? <a href="/login">Click Here</a>
            </div>
        </div>
    </div>
@endsection
