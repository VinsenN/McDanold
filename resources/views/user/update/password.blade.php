<div class="mb-3">
    <label for="currPassword" class="form-label fs-6">Current Password</label>
    <input type="password" class="form-control @error('currentPassword') is-invalid @enderror" id="currPassword" name="currentPassword">
    @error('currentPassword')
        <div class="text-danger">
            <p>{{ $errors->first('currentPassword') }}</p>
        </div>
    @enderror
</div>
<div class="mb-3">
    <label for="newPassword" class="form-label fs-6">New Password</label>
    <input type="password" class="form-control @error('newPassword') is-invalid @enderror" id="newPassword" name="newPassword">
    @error('newPassword')
        <div class="text-danger">
            <p>{{ $errors->first('newPassword') }}</p>
        </div>
    @enderror
</div>
<div class="mb-3">
    <label for="confirmNewPassword" class="form-label fs-6">Confirm New
        Password</label>
    <input type="password" class="form-control @error('confirmNewPassword') is-invalid @enderror" id="confirmNewPassword" name="confirmNewPassword">
    @error('confirmNewPassword')
        <div class="text-danger">
            <p>{{ $errors->first('confirmNewPassword') }}</p>
        </div>
    @enderror
</div>
