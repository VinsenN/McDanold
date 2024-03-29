@extends('template.layout')

@section('content')
    @if (session()->has('success'))
        <div data-bs-toggle="modal" data-bs-target="#successModal"></div>

        <script>
            window.onload = () => {
                document.querySelector('[data-bs-target="#successModal"]').click();
            }
        </script>

        <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title text-success fs-5" id="successModalLabel"><i class="bi bi-check-circle-fill"></i> {{ session()->get('success') }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <main class="container pt-0 pb-5">
        <div class="row">
            <div class="col-md-3 me-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle border-dark my-3" width="200px" height="200px"
                        src="@if (auth()->user()->image_path == null) {{ URL::to('image/default-user.jpg') }}
                            @else
                                {{ URL::asset('storage/public/images/' . auth()->user()->image_path) }} @endif">

                    <p class="font-weight-bold
                        mb-2">{{ auth()->user()->name }}</p>
                    <p class="text-black-50">{{ auth()->user()->email }}</p>
                    <form method="POST" action="{{ route('user.updateImage') }}" enctype="multipart/form-data">
                        @csrf
                        <label class="btn btn-primary">
                            <input type="file" onchange="form.submit()" style="display: none" name="file">
                            <i class="fa fa-cloud-upload"></i> Upload Image
                        </label>
                        @error('file')
                            <div class="text-danger pt-1">
                                <p>{{ $errors->first('file') }}</p>
                            </div>
                        @enderror
                    </form>
                </div>
            </div>
            <div class="col-md-7 border-right py-5">
                <p class="fs-2 fw-bold">Profile</p>
                <p><span class="fw-bold">Email: </span>{{ auth()->user()->email }}</p>
                <p><span class="fw-bold">Name: </span>{{ auth()->user()->name }}</p>
                <p><span class="fw-bold">Gender: </span>{{ auth()->user()->gender }}</p>
                <p><span class="fw-bold">Date Of Birth:
                    </span>{{ \Carbon\Carbon::parse(auth()->user()->date_of_birth)->format('l, m/d/Y') }}</p>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#profileModal">Update
                    Profile</button>
                <button type="button" class="btn btn-primary mx-3" data-bs-toggle="modal"
                    data-bs-target="#passwordModal">Update Password</button>


                <script>
                    @error('info')
                        window.onload = () => {
                            document.querySelector('[data-bs-target="#profileModal"]').click();
                        }
                    @enderror

                    @if ($errors->has('password') or $errors->has('passwordFailMatch'))
                        window.onload = () => {
                            document.querySelector('[data-bs-target="#passwordModal"]').click();
                        }
                    @endif
                </script>

                {{-- Update Profile Section --}}
                <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="POST" enctype="multipart/form-data" action="{{ route('user.updateInfo') }}">
                                @csrf
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="profileModalLabel">Update Profile</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    @include('user.update.info')
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
                            <form method="POST" enctype="multipart/form-data"
                                action=" {{ route('user.updatePassword') }}">
                                @csrf
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="passwordModalLabel">Change Password</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                @error('passwordFailMatch')
                                    <div class="alert alert-danger text-center mx-3 mt-2 mb-1" role="alert">
                                        <span class="fw-bold">Password Change Failed: </span><span class="fw-semibold">Incorrect
                                            Old Password</span>
                                    </div>
                                @enderror
                                <div class="modal-body">
                                    @include('user.update.password')
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
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
