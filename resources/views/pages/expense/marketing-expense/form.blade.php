<div class="box-body">
    <div class="form-group">
        <label for="marketing_expense_date" class="required"> Date </label>
        <input type="date" class="form-control @error('marketing_expense_date') is-invalid @enderror"
            id="marketing_expense_date" placeholder="" name="marketing_expense_date"
            value="{{ old('marketing_expense_date', get_ymd($marketingExpense->marketing_expense_date ?? null)) }}"
            required>
        @error('marketing_expense_date')
            <div class="valid-feedback text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="staff_id" class="required"> Staff </label>
        <select class="form-control select2 @error('staff_id') is-invalid @enderror" style="width: 100%;" id="staff_id"
            name="staff_id" required>
            <option value=""> Select </option>
            @foreach ($staffs as $staff)
                <option value="{{ $staff->id }}" @selected($staff->id == old('staff_id', $marketingExpense->staff_id ?? null))> {{ $staff->staff_name }}
                </option>
            @endforeach
        </select>
        @error('staff_id')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="expense_name" class="required"> Expense Name </label>
        <input type="text" class="form-control @error('expense_name') is-invalid @enderror" id="expense_name"
            placeholder="enter expense name" name="expense_name"
            value="{{ old('expense_name', $marketingExpense->expense_name ?? null) }}" required>
        @error('expense_name')
            <div class="valid-feedback text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="marketing_expense_description"> Description</label>
        <textarea class="form-control @error('marketing_expense_description') is-invalid @enderror" rows="3"
            id="marketing_expense_description" placeholder="enter description" name="marketing_expense_description">{{ old('marketing_expense_description', $marketingExpense->marketing_expense_description ?? null) }}</textarea>
        @error('marketing_expense_description')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="marketing_expense_amount" class="required"> Expense Amount </label>
        <input type="number" class="form-control @error('marketing_expense_amount') is-invalid @enderror"
            id="marketing_expense_amount" name="marketing_expense_amount"
            value="{{ old('marketing_expense_amount', $marketingExpense->marketing_expense_amount ?? null) }}"
            placeholder="enter office expense amount" required>
        @error('marketing_expense_amount')
            <span>{{ $message }}</span>
        @enderror
    </div>

</div>
