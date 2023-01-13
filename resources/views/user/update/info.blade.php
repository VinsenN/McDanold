<div class="mb-3">
    <label for="emailInput" class="form-label">Email address</label>
    <input type="email" class="form-control" id="emailInput" aria-describedby="emailHelp" name="email"
        value="{{ auth()->user()->email }}" disabled>
</div>
<div class="mb-3">
    <label for="nameInput" class="form-label">Name</label>
    <input class="form-control @error('name') is-invalid @enderror" id="nameInput" name="name"
        value="{{ @old('name') ? @old('name') : auth()->user()->name }}">
    @error('name')
        <div class="text-danger">
            <p>{{ $errors->first('name') }}</p>
        </div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Gender</label>
    <div class="form-check">
        <input class="form-check-input @error('gender') border-danger @enderror" type="radio" name="gender"
            id="male" value="Male"
            {{ @old('gender') ? (@old('gender') == 'Male' ? 'checked' : '') : (auth()->user()->gender == 'Male' ? 'checked' : '') }}>
        <label class="form-check-label" for="male">
            Male
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input @error('gender') border-danger @enderror" type="radio" name="gender"
            id="female" value="Female"
            {{ @old('gender') ? (@old('gender') == 'Female' ? 'checked' : '') : (auth()->user()->gender == 'Female' ? 'checked' : '') }}>
        <label class="form-check-label" for="female">
            Female
        </label>
    </div>
    @error('gender')
        <div class="text-danger">
            <p>{{ $errors->first('gender') }}</p>
        </div>
    @enderror
</div>

<div class="mb-3">
    <label for="dob">Date of Birth: </label>
    <input class="@error('date_of_birth') border-danger @enderror" type="date" id="dob" name="date_of_birth"
        value="{{ @old('date_of_birth') ? @old('date_of_birth') : auth()->user()->date_of_birth }}">
    @error('date_of_birth')
        <div class="text-danger">
            <p>{{ $errors->first('date_of_birth') }}</p>
        </div>
    @enderror
</div>
