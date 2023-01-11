@extends('template.layout')

@section('content')
    @if (session()->has('success'))
        <div class="toast align-items-center show my-0 mx-auto mt-3" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body text-success fw-bold">
                    Success Message
                </div>
                <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    @endif

    <main class="container pt-0 pb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle border-dark my-3" width="200px" height="200px"
                        src="https://i.kym-cdn.com/photos/images/newsfeed/002/229/102/5c5.jpg">
                    <p class="font-weight-bold mb-2">John Xina</p>
                    <p class="text-black-50">johnxina@gmail.com</p>

                    <form action="http://google.com">
                        @csrf
                        <label class="btn btn-primary">
                            <input type="file" onchange="form.submit()" style="display: none" />
                            <i class="fa fa-cloud-upload"></i> Upload Image
                        </label>
                    </form>
                </div>
            </div>
            <div class="col-md-5 border-right py-5">
                <p class="fs-2 fw-bold">Profile</p>
                <p><span class="fw-bold">Email: </span>johnxina@gmail.com</p>
                <p><span class="fw-bold">Name: </span>John Wok Xina</p>
                <p><span class="fw-bold">Gender: </span>Male</p>
                <p><span class="fw-bold">Date Of Birth: </span>2022/02/02</p>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#profileModal">Update
                    Profile</button>
                <button type="button" class="btn btn-primary mx-3" data-bs-toggle="modal"
                    data-bs-target="#passwordModal">Update
                    Password</button>

                {{-- Update Profile Section --}}
                <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="POST" enctype="multipart/form-data" action="">
                                @csrf
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="profileModalLabel">Update Profile</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="emailInput" class="form-label">Email address</label>
                                        <input type="email" class="form-control" id="emailInput"
                                            aria-describedby="emailHelp" name="email">
                                    </div>
                                    <div class="mb-3">
                                        <label for="nameInput" class="form-label">Name</label>
                                        <input class="form-control" id="nameInput" name="name">
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
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button class="btn btn-primary" type="submit">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- Update Password Section --}}
                <div class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="passwordModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="POST" enctype="multipart/form-data" action="">
                                @csrf
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="passwordModalLabel">Change Password</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="currPassword" class="form-label fs-6">Current Password</label>
                                        <input type="password" class="form-control" id="currPassword"
                                            name="currentPassword">
                                    </div>
                                    <div class="mb-3">
                                        <label for="newPassword" class="form-label fs-6">New Password</label>
                                        <input type="password" class="form-control" id="newPassword" name="newPassword">
                                    </div>
                                    <div class="mb-3">
                                        <label for="confirmNewPassword" class="form-label fs-6">Confirm New
                                            Password</label>
                                        <input type="password" class="form-control" id="confirmNewPassword"
                                            name="confirmNewPassword">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button class="btn btn-primary" type="submit">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
