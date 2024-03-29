<div class="box-body">
    <div class="form-group">
        <label for="staff_id" class="required"> Staff ID </label>
        <input type="text" class="form-control @error('staff_id') is-invalid @enderror" id="staff_id"
            placeholder="enter staff id" name="staff_id" value="{{ old('staff_id', $staff->staff_id ?? null) }}"
            required>
        @error('staff_id')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="staff_name" class="required"> Staff Name </label>
        <input type="text" class="form-control @error('staff_name') is-invalid @enderror" id="staff_name"
            placeholder="enter staff name" name="staff_name"
            value="{{ old('staff_name', $staff->staff_name ?? null) }}" required>
        @error('staff_name')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="staff_mobile_no" class="required"> Staff Mobile No </label>
        <input type="text" class="form-control @error('staff_mobile_no') is-invalid @enderror" id="staff_mobile_no"
            placeholder="enter staff mobile no" name="staff_mobile_no"
            value="{{ old('staff_mobile_no', $staff->staff_mobile_no ?? null) }}" required>
        @error('staff_mobile_no')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="staff_address"> Staff Address </label>
        <textarea class="form-control @error('staff_address') is-invalid @enderror" rows="3" id="staff_address"
            placeholder="enter address" name="staff_address">{{ old('staff_address', $staff->staff_address ?? null) }}</textarea>
        @error('staff_address')
            <span>{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="staff_nid_no"> NID No </label>
        <input type="number" class="form-control @error('staff_nid_no') is-invalid @enderror" id="staff_nid_no"
            name="staff_nid_no" value="{{ old('staff_nid_no', $staff->staff_nid_no ?? null) }}"
            placeholder="enter NID No">
        @error('staff_nid_no')
            <span>{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="staff_email_address"> Email address </label>
        <input type="email" class="form-control @error('staff_email_address') is-invalid @enderror"
            id="staff_email_address" name="staff_email_address"
            value="{{ old('staff_email_address', $staff->staff_email_address ?? null) }}"
            placeholder="enter email address">
        @error('staff_email_address')
            <span>{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="staff_salary_amount" class="required"> Salary Amount </label>
        <input type="text" class="form-control @error('staff_salary_amount') is-invalid @enderror"
            id="staff_salary_amount" name="staff_salary_amount"
            value="{{ old('staff_salary_amount', $staff->staff_salary_amount ?? null) }}"
            placeholder="enter salary amount" required>
        @error('staff_salary_amount')
            <span>{{ $message }}</span>
        @enderror
    </div>

</div>
