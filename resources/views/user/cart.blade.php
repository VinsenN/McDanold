@extends('template.layout')

@section('content')
    <div class="container py-5">
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
                @for ($i = 1; $i <= 3; $i++)
                    <tr class="align-middle">
                        <th scope="row">{{ $i }}</th>
                        <td><img src="https://m.media-amazon.com/images/I/51T-K7TreuL.jpg" class="img-fluid rounded-start"
                                alt="..." style="height: 3vw; width: auto;"></td>
                        <td>Vaporeon {{ $i }}</td>
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
        <button type="button" class="btn btn-success float-end">Purchase</button>
    </div>
@endsection
