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

    <div class="container mt-5 mb-2">
        <form method="GET" enctype="multipart/form-data" role="search">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="filter" id="allRadio" value="all"
                    @if ($status == 0) checked @endif>
                <label class="form-check-label fw-semibold" for="allRadio">All</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="filter" id="pendingRadio" value="pending"
                    @if ($status == 1) checked @endif>
                <label class="form-check-label text-warning fw-semibold" for="pendingRadio">Pending</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="filter" id="doneRadio" value="done"
                    @if ($status == 2) checked @endif>
                <label class="form-check-label text-success fw-semibold" for="doneRadio">Done</label>
            </div>
            <button type="submit" class="btn btn-info">Apply</button>
        </form>
    </div>

    <div class="container">
        <div class="accordion">
            @php
                $i = 0;
            @endphp
            @foreach ($orders as $order)
                <div class="accordion-item my-4 border">
                    <h2 class="accordion-header" id="heading{{ $i }}">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse{{ $i }}" aria-expanded="false"
                            aria-controls="collapse{{ $i }}">

                            <span>
                                @if (auth()->user()->role == 'admin')
                                    <span class="fw-semibold">Order {{ $order->id }}</span> - {{ $order->created_at }}
                                    GMT+7,
                                    by
                                    <span class="fw-semibold">{{ $order->user->name }}</span>
                                @else
                                    <span class="fw-semibold">Order {{ $order->id }}</span> - {{ $order->created_at }}
                                    GMT+7
                                @endif
                            </span>
                            @if ($order->status == 1)
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
                                        <th scope="col">Menu</th>
                                        <th scope="col">Size</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Qty</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $totalTrans = 0;
                                    @endphp
                                    @foreach ($order->transactionDetails as $transactionDetail)
                                        <tr class="align-middle">
                                            <td> {{ $transactionDetail->order_menu_name }} </td>
                                            <td> {{ $transactionDetail->order_menu_size }} </td>
                                            <td>IDR {{ $transactionDetail->order_menu_price }} </td>
                                            <td> {{ $transactionDetail->order_menu_quantity }} </td>

                                            @php
                                                $multiplier = 1;
                                                if ($transactionDetail->order_menu_size == 'Large') {
                                                    $multiplier = 2;
                                                }
                                                $totalMenuPrice = $transactionDetail->order_menu_price * $transactionDetail->order_menu_quantity * $multiplier;
                                                $totalTrans += $totalMenuPrice;
                                            @endphp
                                            <td>IDR {{ $totalMenuPrice }}</td>
                                        </tr>
                                    @endforeach
                                    <tr class="align-middle">
                                        <th scope="row">Sum</th>
                                        <td colspan="3"></td>
                                        <td class="fw-bold">IDR {{ $totalTrans }} </td>
                                    </tr>
                                </tbody>
                            </table>
                            @if (auth()->user()->role == 'admin' and $order->status == 1)
                                <form action="{{ route('admin.finishOrder', ['id' => $order->id]) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Finish Order</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
                @php
                    $i += 1;
                @endphp
            @endforeach
        </div>
    </div>
@endsection
