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
                        <h1 class="modal-title text-success fs-5" id="successModalLabel"><i
                                class="bi bi-check-circle-fill"></i> {{ session()->get('success') }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="container pt-5">
        <a href="/menu" class="btn btn-primary mb-3"><i class="bi bi-backspace"></i> Back</a>
    </div>
    <div class="container mt-auto pt-4">
        <div class="row">
            <div class="col-sm-5 d-flex align-items-center justify-content-center mb-4">
                <img src="/storage/images/{{ $menu->photo }}" alt="..." style="min-width: 100%">
            </div>
            <div class="col-sm-6">
                <p class="fs-4 fw-bold m-0">
                    {{ $menu->name }} @if ($menu->is_recommended)
                        <i class="bi bi-fire text-danger"></i>
                    @endif
                </p>
                <p class="p-0 text-muted fs-6">{{ $menu->category->name }}</p>
                <p class="fw-semibold">
                    Price:
                    <span class="fw-normal">
                        IDR {{ $menu->price }}
                    </span>
                </p>

                <p class="fw-semibold">
                    Description:
                    <span class="fw-normal">
                        {{ $menu->description }}
                    </span>
                </p>

                @if (Auth::check() && auth()->user()->role == 'user')
                    <form action="{{ route('user.addCart', ['id' => $menu->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <p class="fw-semibold mb-2">Size: </p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="size" id="small" value="small"
                                    checked>
                                <label class="form-check-label" for="small">
                                    Small
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="size" id="large" value="large">
                                <label class="form-check-label" for="large">
                                    Large
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="fw-semibold me-2" for="quantity">Quantity:</label>
                            <input type="number" id="quantity" name="quantity" min="1" max="50"
                                value="1">

                            @error('quantity')
                                <div class="text-danger pt-1">
                                    <p>{{ $errors->first('quantity') }}</p>
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Add to Cart</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection
