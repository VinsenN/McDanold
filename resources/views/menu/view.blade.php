@extends('template.layout')

@section('content')
    {{-- @if (auth()->user()->role == 'admin') --}}
    <div class="container-fluid pt-4">
        <div class="row">
            <div class="col-8">
                <form action="">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Enter Menu Name"
                            aria-label="Enter Menu Name" aria-describedby="button-addon2">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2">Search</button>
                    </div>
                </form>
            </div>
            <div class="col-4">
                <a href="/menu/add" class="btn btn-success float-end me-2">Add Menu</a>
            </div>
        </div>
    </div>
    {{-- @endif --}}

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

    <div class="container-fluid pt-2">
        <div class="row">
            <div class="col-12 col-lg-2 col-md-3 px-0 mb-4 d-flex">
                <div class="d-flex flex-sm-column flex-row flex-grow-1 align-items-center align-items-sm-start px-3">
                    <ul class="nav flex-sm-column flex-column flex-nowrap overflow-auto w-100 mb-sm-auto mb-0 justify-content-center align-items-center align-items-sm-start"
                        id="menu">
                        <h4 class="mb-3 w-100 text-center text-md-start">Categories</h4>

                        <li class="nav-item w-100 px-2 py-1 rounded-2" style="background-color: #DA291C">
                            <a href="#" class="nav-link px-sm-0 px-2 text-light text-center text-md-start">Food X</a>
                        </li>

                        <li class="nav-item w-100 px-2 py-1 rounded-2">
                            <a href="#" class="nav-link px-sm-0 px-2 text-dark text-center text-md-start">Food Y</a>
                        </li>

                        <li class="nav-item w-100 px-2 py-1 rounded-2">
                            <a href="#" class="nav-link px-sm-0 px-2 text-dark text-center text-md-start">Food Z</a>
                        </li>

                        <li class="nav-item w-100 px-2 py-1 rounded-2">
                            <a href="#" class="nav-link px-sm-0 px-2 text-dark text-center text-md-start">Food Sus</a>
                        </li>

                        <li class="nav-item w-100 px-2 py-1 rounded-2">
                            <a href="#" class="nav-link px-sm-0 px-2 text-dark text-center text-md-start">Drinks</a>
                        </li>

                    </ul>
                </div>
            </div>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <h2>Food Y</h2>
                <div class="row row-cols-1 row-cols-md-5 g-4">
                    @for ($i = 1; $i <= 10; $i++)
                        <div class="col">
                            <div class="card w-100">
                                <img src="https://m.media-amazon.com/images/I/51T-K7TreuL.jpg" class="card-img-top mx-auto w-75"
                                    alt="...">
                                <div class="card-body d-flex flex-md-column justify-content-between align-items-center w-100 mx-1">
                                    <a href="/menu/view/{{ $i }}"
                                        class="stretched-link text-decoration-none text-dark">
                                        <div class="d-flex flex-column">
                                            <p class="card-title fw-bold mb-0">Vaporeon {{ $i }} </p>
                                            <p class="card-text">Rp 10.000</p>
                                        </div>
                                    </a>
                                    <div class="d-flex pt-md-4">
                                        <a href="#" class="btn btn-warning me-2"><i class="bi bi-pencil-square"></i></a>
                                        <a href="#" class="btn btn-danger me-2"><i class="bi bi-trash"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
                <div class="d-flex flex-row-reverse mt-3">
                    <div aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </div>
                </div>
                <div class="p-2 px-3 border rounded d-flex justify-content-between align-items-center">
                    <div><span class="fw-semibold">Total Price: </span> Rp 30.000</div>
                    <button type="button" class="btn btn-success">Check Out</button>
                </div>
            </main>
        </div>
    </div>
@endsection
