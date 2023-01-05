@extends('template.layout')

@section('content')
    <div class="container-fluid pt-5">
        <div class="row">
            <nav class="col-md-3 col-lg-2 d-md-block sidebar collapse">
                <div class="position-sticky sidebar-sticky">
                    <nav class="nav flex-column">
                        <a class="nav-link text-dark fw-bold border border-end-0" href="#">Food X</a>
                        <a class="nav-link text-dark" href="#">Food Y</a>
                        <a class="nav-link text-dark" href="#">Food Z</a>
                        <a class="nav-link text-dark" href="#">Food Sus</a>
                        <a class="nav-link text-dark" href="#">Drink</a>
                    </nav>
                </div>
            </nav>
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
