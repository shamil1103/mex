<div class="box-body">
    <div class="form-group">
        <label for="name" class="required">Name </label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
            placeholder="enter name" name="name" value="{{ old('name', $user->name ?? null) }}" required>
        @error('name')
            <span>{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="box-body">
    <div class="form-group">
        <label for="email" class="required">Email </label>
        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
            placeholder="enter email" name="email" value="{{ old('email', $user->email ?? null) }}" required>
        @error('email')
            <span>{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="box-body">
    <div class="form-group">
        <label for="password" @if (!isset($user)) class="required" @endif>Password</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
            placeholder="enter password" name="password" value=""
            @if (!isset($user)) required @endif>
        @error('password')
            <span>{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="box-body">
    <div class="form-group">
        <label for="password_confirmation" @if (!isset($user)) class="required" @endif>Confirm Password
        </label>
        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
            id="password_confirmation" placeholder="enter confirm password" name="password_confirmation" value=""
            @if (!isset($user)) required @endif>
        @error('password_confirmation')
            <span>{{ $message }}</span>
        @enderror
    </div>
</div>
