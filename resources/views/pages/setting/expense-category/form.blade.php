<div class="box-body">
    <div class="form-group">
        <label for="name" class="required">Name </label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
            placeholder="enter name" name="name" value="{{ old('name', $expenseCategory->name ?? null) }}" required>
        @error('name')
            <span>{{ $message }}</span>
        @enderror
    </div>
</div>
