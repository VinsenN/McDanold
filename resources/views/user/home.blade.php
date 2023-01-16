@extends('template.layout')

@section('content')
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            @for ($i = 1; $i <= 3; $i++)
                <div class="carousel-item {{ $i == 1 ? 'active' : '' }}">
                    <img src="https://assets.promediateknologi.com/crop/0x0:0x0/x/photo/2022/12/12/905998228.jpeg"
                        class="d-block w-100" alt="" height="500px" width=auto>
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{ $i }} slide label</h5>
                        <p>Some representative placeholder content for the {{ $i }} slide.</p>
                    </div>
                </div>
            @endfor
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="container my-5">
        <div class="px-4 py-5 my-5 text-center">
            <img class="d-block mx-auto mb-2" src="{{ URL::asset('image/logo.png') }}" alt="" width="72"
                height="57">
            <h1 class="display-5 fw-bold">McDanold</h1>
            <div class="col-lg-6 mx-auto">
                <p class="lead mb-4">Providing the best meal you've ever tasted.</p>
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                    <a href="/menu" type="button" class="btn btn-danger btn-lg px-4 gap-3">Order Here</a>
                </div>
            </div>
        </div>
        <hr>
        <div class="px-4 py-5 my-5 text-center">
            <h1 class="display-5 fw-bold">About Us</h1>
            <div class="col-lg-6 mx-auto">
                <p class="lead mb-4">Founded in 1955, McDanold has become the most popular burger chain restaurant of all time.</p>
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                    <a href="/about-us" type="button" class="btn btn-danger btn-lg px-4 gap-3">Learn more</a>
                </div>
            </div>
        </div>
    </div>
@endsection
