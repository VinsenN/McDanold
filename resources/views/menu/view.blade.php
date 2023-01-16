@extends('template.layout')

@section('content')
    <div class="container-fluid pt-4">
        <div class="row">
            <div class="col-8">
                <form method="GET" enctype="multipart/form-data" role="search">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Enter Menu Name" aria-label="Enter Menu Name"
                            aria-describedby="button-addon2" name="name"
                            value="@if (isset($query['name'])) {{ $query['name'] }} @endif">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                    </div>
                </form>
            </div>
            <div class="col-4">
                @if (Auth::check() && auth()->user()->role == 'admin')
                    <a href="/menu/add" class="btn btn-success float-end me-2">Add Menu</a>
                @endif
            </div>
        </div>
    </div>

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

    <div class="container-fluid pt-2">
        <div class="row">
            <div class="col-12 col-lg-2 col-md-3 px-0 mb-4 d-flex">
                <div class="d-flex flex-sm-column flex-row flex-grow-1 align-items-center align-items-sm-start px-3">
                    <ul class="nav flex-sm-column flex-column flex-nowrap overflow-auto w-100 mb-sm-auto mb-0 justify-content-center align-items-center align-items-sm-start"
                        id="menu">
                        <h4 class="mb-3 w-100 text-center text-md-start">Categories</h4>

                        @php
                            $linkCat = '/menu';
                            if (isset($query['name'])) {
                                $linkCat = $linkCat . '?name=' . $query['name'];
                            }
                        @endphp

                        <li class="nav-item w-100 px-2 py-1 rounded-2"
                            @empty($cat) style="background-color: #DA291C" @endempty>
                            <a href="{{ $linkCat }}"
                                class="nav-link px-sm-0 px-2 text-center text-md-start @empty($cat) {{ 'text-light' }} @else {{ 'text-dark' }} @endempty">All</a>
                        </li>
                        @foreach ($categories as $category)
                            @php
                                $linkCat = '/menu/category/' . $category->id;
                                if (isset($query['name'])) {
                                    $linkCat = $linkCat . '?name=' . $query['name'];
                                }
                            @endphp

                            @empty($cat)
                                <li class="nav-item w-100 px-2 py-1 rounded-2">
                                    <a href="{{ $linkCat }}"
                                        class="nav-link px-sm-0 px-2 text-center text-md-start text-dark">{{ $category->name }}</a>
                                </li>
                            @else
                                <li class="nav-item w-100 px-2 py-1 rounded-2"
                                    @if ($cat->id == $category->id) style="background-color: #DA291C" @endif>
                                    <a href="{{ $linkCat }}"
                                        class="nav-link px-sm-0 px-2 text-center text-md-start @if ($cat->id == $category->id) {{ 'text-light' }} @else {{ 'text-dark' }} @endif">{{ $category->name }}</a>
                                </li>
                            @endempty
                        @endforeach
                    </ul>
                </div>
            </div>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <h2>
                    @empty($cat)
                        All
                    @else
                        {{ $cat->name }}
                    @endempty
                </h2>
                <div class="row row-cols-1 row-cols-md-5 g-4">
                    @forelse ($menus as $menu)
                        <div class="col">
                            <div class="card w-100">
                                <div
                                    class="card-body d-flex flex-column justify-content-between align-items-center w-100 mx-1 px-0 text-center">
                                    <a href="/menu/view/{{ $menu->id }}" class="text-decoration-none text-dark w-100 mb-3">
                                        <div class="d-block mx-auto w-75 m-0 mb-2 p-0 border border-dark"
                                             id="menu-image">
                                            <img src="/storage/images/{{ $menu->photo }}"
                                                class="card-img-top mx-auto w-100 h-100" alt="...">
                                        </div>
                                        <div class="d-flex flex-column me-2">
                                            <p class="card-title fw-bold m-0 d-block text-truncate text-center">
                                                @if ($menu->is_recommended) <i class="bi bi-fire text-danger"></i> @endif {{ $menu->name }}
                                            </p>
                                            <p class="card-text">IDR {{ $menu->price }}</p>
                                        </div>
                                    </a>
                                    @if (Auth::check() && auth()->user()->role == 'admin')
                                    <div class="d-flex pt-md-4 mb-4">
                                        <a href="/menu/{{ $menu->id }}/update" class="btn btn-warning me-2"><i
                                                class="bi bi-pencil-square"></i></a>
                                        <form method="POST" action="{{ route('admin.deleteMenu', ['id' => $menu->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger me-2"><i
                                                    class="bi bi-trash"></i></button>
                                        </form>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        <div>
                            No Product
                        </div>
                    @endforelse
                </div>

                @php
                    $paginationMenu = $menus;
                    if (isset($query['name'])) {
                        $paginationMenu = $paginationMenu->appends($query);
                    }
                @endphp

                <div class="d-flex flex-row-reverse mt-3">
                    <div aria-label="Page navigation example">
                        <ul class="pagination">

                            <li class="page-item {{ $paginationMenu->currentPage() == 1 ? 'disabled' : '' }}  fw-bold">
                                <a class="page-link" href="{{ $paginationMenu->url($paginationMenu->currentPage() - 1) }}">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            @for ($i = 1; $i <= $paginationMenu->lastPage(); $i++)
                                <li class="page-item {{ $paginationMenu->currentPage() == $i ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $paginationMenu->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor
                            <li
                                class="page-item {{ $paginationMenu->currentPage() == $paginationMenu->lastPage() ? 'disabled' : '' }} fw-bold">
                                <a class="page-link" href="{{ $paginationMenu->url($paginationMenu->currentPage() + 1) }}">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                @if (Auth::check() && auth()->user()->role == 'user')
                    <div class="p-2 px-3 border rounded d-flex flex-row-reverse justify-content-between align-items-center">
                        <button type="button" class="btn btn-success float-end">Check Out</button>
                    </div>
                @endif
            </main>
        </div>
    </div>
@endsection
