@extends('template.layout')

@section('content')
    <div class="container pt-5">
        <a href="{{ url()->previous() }}" class="btn btn-primary mb-3"><i class="bi bi-backspace"></i> Back</a>
        <form action="{{ route('admin.addMenu') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="text-center fw-bold">
                Add Menu Form
            </div>
            <div class="mb-3">
                <label for="nameInput" class="form-label fw-semibold">Name</label>
                <input class="form-control @error('name') is-invalid @enderror" id="nameInput" name="name"
                    value="{{ @old('name') }}">
                @error('name')
                    <div class="text-danger">
                        <p>{{ $errors->first('name') }}</p>
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="categoryInput" class="form-label fw-semibold">Category</label>
                <select class="form-select" id="categoryInput" name="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if (@old('category_id') == $category->id) {{ 'selected' }} @endif>
                            {{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="descriptionInput" class="form-label fw-semibold">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="descriptionInput" rows="3"
                    name="description"> {{ @old('description') }}</textarea>
                @error('description')
                    <div class="text-danger">
                        <p>{{ $errors->first('description') }}</p>
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="priceInput" class="form-label fw-semibold">Price</label>
                <div class="input-group">
                    <div class="row align-items-center">
                        <div class="col-6 input-group">
                            <span class="input-group-text" id="basic-addon1">IDR</span>
                            <input class="form-control @error('price') is-invalid @enderror" id="priceInput" name="price"
                                value="{{ @old('price') }}">
                        </div>
                    </div>
                </div>
                @error('price')
                    <div class="text-danger">
                        <p>{{ $errors->first('price') }}</p>
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="imageInput" class="form-label fw-semibold">Image</label>
                <div class="row align-items-center">
                    <div class="col-6">
                        <input type="file" class="form-control @error('photo') is-invalid @enderror" id="imageInput" name="photo">
                    </div>
                </div>
                @error('photo')
                    <div class="text-danger">
                        <p>{{ $errors->first('photo') }}</p>
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="is_recommended">
                <label class="form-check-label" for="flexCheckDefault">
                    Recommended
                </label>
            </div>
            <button type="submit" class="btn btn-success mb-4 px-4">Add Menu</button>
        </form>
    </div>
@endsection
