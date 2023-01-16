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
                @php
                    $totalPrice = 0;
                    $exist = null;
                @endphp
                @foreach ($order->orderDetails as $orderDetail)
                    <tr class="align-middle">
                        <td> {{ $orderDetail->menu->name }} </td>
                        <td> {{ $orderDetail->size }}</td>
                        <td>IDR {{ $orderDetail->menu->price }}</td>
                        <td>{{ $orderDetail->quantity }} </td>
                        <td>
                            <form action="{{ route('user.removeCart', ['id' => $orderDetail->id]) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <button type="submit"
                                    class="bi bi-trash3-fill text-danger border-0 bg-transparent"></button>
                            </form>
                        </td>
                        @php
                            $multiplier = 1;
                            if ($orderDetail->size == 2) {
                                $multiplier = 2;
                            }
                            $totalPrice += $orderDetail->quantity * ($orderDetail->menu->price * $multiplier);
                            $exist = 1;
                        @endphp
                    </tr>
                @endforeach
                <tr class="align-middle">
                    <th scope="row">Sum</th>
                    <td colspan="3"></td>
                    <td class="fw-bold">IDR {{ $totalPrice }}</td>
                </tr>
            </tbody>
        </table>

        <form action="{{ route('user.purchaseCart') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <button type="submit" class="btn btn-success float-end" @empty($exist) disabled @endempty>Purchase</button>
        </form>
    </div>
@endsection
