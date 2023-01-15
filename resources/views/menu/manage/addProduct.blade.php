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
                <label for="nameInput" class="form-label fw-semibold">Name</label>
                <input class="form-control" id="nameInput" name="name">
            </div>
            <div class="mb-3">
                <label for="categoryInput" class="form-label fw-semibold">Category</label>
                <select class="form-select" id="categoryInput">
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="descriptionInput" class="form-label fw-semibold">Description</label>
                <textarea class="form-control" id="descriptionInput" rows="3" name="description"></textarea>
            </div>
            <div class="mb-3">
                <label for="priceInput" class="form-label fw-semibold">Price</label>
                <div class="input-group">
                    <div class="row align-items-center">
                        <div class="col-6 input-group">
                            <span class="input-group-text" id="basic-addon1">IDR</span>
                            <input class="form-control" id="priceInput" name="price">
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="imageInput" class="form-label fw-semibold">Image</label>
                <div class="row align-items-center">
                    <div class="col-6">
                        <input type="file" class="form-control" id="imageInput" name="photo">
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="is_recommended">
                <label class="form-check-label" for="flexCheckDefault">
                    Recommended
                </label>
            </div>
            <button type="submit" class="btn btn-success mb-4 px-4">Add Menu</button>
        </form>
    </div>
@endsection
