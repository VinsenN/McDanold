@extends('template.layout')

@section('content')
    <div class="container-fluid pt-5">
        <div class="row">
            <div class="col-12 col-lg-2 col-md-3 px-0 mb-4 d-flex sticky-sm-top">
                <div class="d-flex flex-sm-column flex-row flex-grow-1 align-items-center align-items-sm-start px-3">
                    <ul class="nav flex-sm-column flex-column flex-nowrap overflow-auto w-100 mb-sm-auto mb-0 justify-content-center align-items-center align-items-sm-start" id="menu">
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
                            <div class="card">
                                <img src="https://m.media-amazon.com/images/I/51T-K7TreuL.jpg" class="card-img-top mx-auto"
                                    alt="..." style="height: 10vw; width: 10vw;">
                                <div class="card-body">
                                    <a href="/menu/{{ $i }}" class="stretched-link text-decoration-none text-dark">
                                        <p class="card-title fw-bold mb-0">Vaporeon {{ $i }}</p>
                                        <p class="card-text">Rp 10.000</p>
                                    </a>
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
