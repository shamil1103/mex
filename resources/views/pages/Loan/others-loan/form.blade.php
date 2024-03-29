<div class="box-body">
    <div class="form-group">
        <label for="loan_date" class="required"> Date </label>
        <input type="date" class="form-control @error('loan_date') is-invalid @enderror" id="loan_date" placeholder=""
            name="loan_date" value="{{ old('loan_date', get_ymd($othersLoan->loan_date ?? null)) }}" required>
        @error('loan_date')
            <div class="valid-feedback text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="loan_name" class="required"> Name </label>
        <input type="text" class="form-control @error('loan_name') is-invalid @enderror" id="loan_name"
            placeholder="enter name" name="loan_name" value="{{ old('loan_name', $othersLoan->loan_name ?? null) }}"
            required>
        @error('loan_name')
            <div class="valid-feedback text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="loan_address"> Address </label>
        <textarea class="form-control @error('loan_address') is-invalid @enderror" rows="3" id="loan_address"
            placeholder="enter address" name="loan_address">{{ old('loan_address', $othersLoan->loan_address ?? null) }}</textarea>
        @error('loan_address')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="loan_reference" class="required"> Reference </label>
        <input type="text" class="form-control @error('loan_reference') is-invalid @enderror" id="loan_reference"
            placeholder="enter reference" name="loan_reference"
            value="{{ old('loan_reference', $othersLoan->loan_reference ?? null) }}" required>
        @error('loan_reference')
            <div class="valid-feedback text-danger">{{ $message }}</div>
        @enderror
    </div>


    <div class="form-group">
        <label for="loan_description"> Description </label>
        <textarea class="form-control @error('loan_description') is-invalid @enderror" rows="3" id="loan_description"
            placeholder="enter description" name="loan_description">{{ old('loan_description', $othersLoan->loan_description ?? null) }}</textarea>
        @error('loan_description')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="loan_amount" class="required"> Expense Amount </label>
        <input type="number" class="form-control @error('loan_amount') is-invalid @enderror" id="loan_amount"
            name="loan_amount" value="{{ old('loan_amount', $othersLoan->loan_amount ?? null) }}"
            placeholder="enter expense amount" required>
        @error('loan_amount')
            <span>{{ $message }}</span>
        @enderror
    </div>

</div>
