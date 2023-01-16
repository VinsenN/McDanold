@extends('template.layout')

@section('content')
    <div class="container mt-auto pt-5">
        <a href="/menu" class="btn btn-primary mb-3"><i class="bi bi-backspace"></i> Back</a>
        <div class="row">
            <div class="col-sm-5 d-flex align-items-center justify-content-center">
                <img src="/storage/images/{{ $menu->photo }}" alt="..." style="height: 15vw; width: 15vw;">
            </div>
            <div class="col-sm-6">
                <p class="fs-4 fw-bold">
                    {{ $menu->name }} @if ($menu->is_recommended)
                        <i class="bi bi-fire text-danger"></i>
                    @endif
                </p>

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

                <form>
                    <div class="mb-3">
                        <p class="fw-semibold mb-2">Size: </p>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sizeProduct" id="small" checked>
                            <label class="form-check-label" for="small">
                                Small
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sizeProduct" id="large">
                            <label class="form-check-label" for="large">
                                Large
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="fw-semibold me-2" for="quantity">Quantity:</label>
                        <input type="number" id="quantity" name="quantity" min="1" max="50" value="1">
                    </div>
                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
@endsection
