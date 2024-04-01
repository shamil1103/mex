<div class="box-body">
    <div class="form-group">
        <label for="expense_date" class="required"> Date </label>
        <input type="date" class="form-control @error('expense_date') is-invalid @enderror" id="expense_date"
            placeholder="" name="expense_date"
            value="{{ old('expense_date', get_ymd($officeExpense->expense_date ?? null)) }}" required>
        @error('expense_date')
            <div class="valid-feedback text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="expense_category_id" class="required"> Expense Category </label>
        <select class="form-control select2 @error('expense_category_id') is-invalid @enderror" style="width: 100%;"
            id="expense_category_id" name="expense_category_id" required>
            <option value=""> Select </option>
            @foreach ($expenseCategories as $expenseCategory)
                <option value="{{ $expenseCategory->id }}" @selected($expenseCategory->id == old('expense_category_id', $officeExpense->expense_category_id ?? null))> {{ $expenseCategory->name }}
                </option>
            @endforeach
        </select>
        @error('expense_category_id')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="expense_name" class="required"> Expense Name </label>
        <input type="text" class="form-control @error('expense_name') is-invalid @enderror" id="expense_name"
            placeholder="enter expense name" name="expense_name"
            value="{{ old('expense_name', $officeExpense->expense_name ?? null) }}" required>
        @error('expense_name')
            <div class="valid-feedback text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="office_expense_description"> Description</label>
        <textarea class="form-control @error('office_expense_description') is-invalid @enderror" rows="3" id="office_expense_description"
            placeholder="enter description" name="office_expense_description">{{ old('office_expense_description', $officeExpense->office_expense_description ?? null) }}</textarea>
        @error('office_expense_description')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="office_expense_amount" class="required"> Expense Amount </label>
        <input type="number" class="form-control @error('office_expense_amount') is-invalid @enderror"
            id="office_expense_amount" name="office_expense_amount"
            value="{{ old('office_expense_amount', $officeExpense->office_expense_amount ?? null) }}"
            placeholder="enter expense amount" required>
        @error('office_expense_amount')
            <span>{{ $message }}</span>
        @enderror
    </div>

</div>
