@extends('template.layout')

@section('content')
    <div class="container py-5">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Menu</th>
                    <th scope="col">Size</th>
                    <th scope="col">Price</th>
                    <th scope="col">Qty</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 1; $i <= 3; $i++)
                    <tr class="align-middle">
                        <td>Vaporeon {{ $i }}</td>
                        <td>Big</td>
                        <td>IDR 10000</td>
                        <td>5</td>
                        <td class="text-danger"><i class="bi bi-trash3-fill"></i></td>
                    </tr>
                @endfor
                <tr class="align-middle">
                    <th scope="row">Sum</th>
                    <td colspan="3"></td>
                    <td class="fw-bold">IDR 300000</td>
                </tr>
            </tbody>
        </table>
        <button type="button" class="btn btn-success float-end">Purchase</button>
    </div>
@endsection
