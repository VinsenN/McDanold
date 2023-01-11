@extends('template.layout')

@section('content')
    <div class="container mt-auto pt-5">
        <div class="row">
            <div class="col-sm-5 d-flex align-items-center justify-content-center">
                <img src="https://m.media-amazon.com/images/I/51T-K7TreuL.jpg" alt="..."
                    style="height: 15vw; width: 15vw;">
            </div>
            <div class="col-sm-6">
                <p class="fs-4 fw-bold">
                    Vaporeon
                </p>

                <p class="fw-semibold">
                    Price:
                    <span class="fw-normal">
                        IDR 30000
                    </span>
                </p>

                <p class="fw-semibold">
                    Description:
                    <span class="fw-normal">
                        Hey guys, did you know that in terms of male human and female Pokémon breeding, Vaporeon is the most
                        compatible Pokémon for humans? Not only are they in the field egg group, which is mostly comprised
                        of mammals, Vaporeon are an average of 3"03' tall and 63.9 pounds. this means they're large enough
                        to be able to handle human dicks, and with their impressive Base Stats for HP and access to Acid
                        Armor, you can be rough with one.
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
