@extends('template.layout')

@section('content')
    <div class="container mt-5">
        <div class="accordion">
            @for ($i = 1; $i <= 5; $i++)
                <div class="accordion-item my-4 border">
                    <h2 class="accordion-header" id="heading{{ $i }}">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse{{ $i }}" aria-expanded="false"
                            aria-controls="collapse{{ $i }}">
                            Order {{ $i }}
                            @if ($i == 1)
                                <span class="btn btn-warning mx-2">Pending</span>
                            @else
                                <span class="btn btn-success mx-2">Done</span>
                            @endif
                        </button>
                    </h2>
                    <div id="collapse{{ $i }}" class="accordion-collapse collapse"
                        aria-labelledby="heading{{ $i }}" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Menu</th>
                                        <th scope="col"></th>
                                        <th scope="col">Size</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Total Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($j = 1; $j <= 3; $j++)
                                        <tr class="align-middle">
                                            <th scope="row">{{ $i }}</th>
                                            <td><img src="https://m.media-amazon.com/images/I/51T-K7TreuL.jpg"
                                                    class="img-fluid rounded-start" alt="..."
                                                    style="height: 3vw; width: auto;"></td>
                                            <td>Vaporeon {{ $j }}</td>
                                            <td>Big</td>
                                            <td>IDR 10000</td>
                                            <td>5</td>
                                            <td>IDR 50000</td>
                                        </tr>
                                    @endfor
                                    <tr class="align-middle">
                                        <th scope="row">Total</th>
                                        <td colspan="5"></td>
                                        <td class="fw-bold">IDR 300000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
@endsection
