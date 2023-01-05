@extends('template.layout')

@section('content')
    <div class="mx-auto mt-5 w-50">
        <div class="container">
            <form class="py-3">
                <div class="mb-3 fw-bold text-center">
                    Register Form
                </div>
                <div class="mb-3">
                    <label for="emailInput" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="emailInput" aria-describedby="emailHelp" name="email">
                </div>
                <div class="mb-3">
                    <label for="nameInput" class="form-label">Name</label>
                    <input class="form-control" id="nameInput" name="name">
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
                </div>
                <div class="mb-3">
                    <label for="passInput" class="form-label">Password Confirmation</label>
                    <div class="row g-2 align-items-center">
                        <div class="col-auto">
                            <input type="password" class="form-control" id="passInput" name="confirmation-password">
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Gender</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="male">
                        <label class="form-check-label" for="male">
                            Male
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="female">
                        <label class="form-check-label" for="female">
                            Female
                        </label>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="dob">Date of Birth: </label>
                    <input type="date" id="dob" name="date_of_birth">
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
            <div>
                Already have an account? <a href="/login">Click Here</a>
            </div>
        </div>
    </div>
@endsection
