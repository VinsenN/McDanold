@extends('template.layout')

@section('content')
    <div class="container pt-5">
        <a href="{{ url()->previous() }}" class="btn btn-primary mb-3"><i class="bi bi-backspace"></i> Back</a>
        <form action="">
            @csrf
            <div class="text-center fw-bold">
                Add Menu Form
            </div>
            <div class="mb-3">
                <label for="nameInput" class="form-label fw-semibold">Menu Name</label>
                <input class="form-control" id="nameInput">
            </div>
            <div class="mb-3">
                <label for="descriptionInput" class="form-label fw-semibold">Description</label>
                <textarea class="form-control" id="descriptionInput" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="priceInput" class="form-label fw-semibold">Price</label>
                <div class="input-group">
                    <div class="row align-items-center">
                        <div class="col-6 input-group">
                            <span class="input-group-text" id="basic-addon1">IDR</span>
                            <input class="form-control" id="priceInput">
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="imageInput" class="form-label fw-semibold">Image</label>
                <div class="row align-items-center">
                    <div class="col-6">
                        <input type="file" class="form-control" id="imageInput">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success float-end mb-4 px-4">Add Menu</button>
        </form>
    </div>
@endsection
