<div class="box-body">
    <div class="form-group">
        <label for="staff_loan_date" class="required"> Date </label>
        <input type="date" class="form-control @error('staff_loan_date') is-invalid @enderror" id="staff_loan_date"
            placeholder="" name="staff_loan_date"
            value="{{ old('staff_loan_date', get_ymd($staffLoan->staff_loan_date ?? null)) }}" required>
        @error('staff_loan_date')
            <div class="valid-feedback text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="staff_id" class="required"> Staff Name </label>
        <select class="form-control select2 @error('staff_id') is-invalid @enderror" style="width: 100%;" id="staff_id"
            name="staff_id" required>
            <option  value=""> Select </option>
            @foreach ($staffs as $staff)
                <option value="{{ $staff->id }}" @selected($staff->id == old('staff_id', $staffLoan->staff_id ?? null))> {{ $staff->staff_name }} </option>
            @endforeach
        </select>
        @error('staff_id')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="staff_address"> Staff Address </label>
        <textarea class="form-control @error('staff_address') is-invalid @enderror" rows="3" id="staff_address"
            placeholder="enter address" name="staff_address">{{ old('staff_address', $staffLoan->staff_address ?? null) }}</textarea>
        @error('staff_address')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="staff_loan_description"> Staff Description </label>
        <textarea class="form-control @error('staff_loan_description') is-invalid @enderror" rows="3"
            id="staff_loan_description" placeholder="enter staff description" name="staff_loan_description">{{ old('staff_loan_description', $staffLoan->staff_loan_description ?? null) }}</textarea>
        @error('staff_loan_description')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="staff_leader_name" class="required"> Leader Name </label>
        <input type="text" class="form-control @error('staff_leader_name') is-invalid @enderror"
            id="staff_leader_name" placeholder="enter leader name" name="staff_leader_name"
            value="{{ old('staff_leader_name', $staffLoan->staff_leader_name ?? null) }}" required>
        @error('staff_leader_name')
            <div class="valid-feedback text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="staff_loan_amount" class="required"> Expense Amount </label>
        <input type="number" class="form-control @error('staff_loan_amount') is-invalid @enderror"
            id="staff_loan_amount" name="staff_loan_amount"
            value="{{ old('staff_loan_amount', $staffLoan->staff_loan_amount ?? null) }}"
            placeholder="enter expense amount" required>
        @error('staff_loan_amount')
            <span>{{ $message }}</span>
        @enderror
    </div>

</div>
