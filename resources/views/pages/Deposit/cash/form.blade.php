<div class="box-body">
    <div class="form-group">
        <label for="deposit_type" class="required"> Deposit Type </label>
        <input type="text" class="form-control is-invalid  @error('date') is-invalid @enderror" id="deposit_type"
            placeholder="Deposit Type" name="deposit_type"
            value="{{ old('deposit_type', $cashDeposit->deposit_type ?? 'Cash') }}" required>
        @error('deposit_type')
            <div class="valid-feedback text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="deposit_date" class="required"> Date </label>
        <input type="date" class="form-control @error('date') is-invalid @enderror" id="deposit_date" placeholder=""
            name="deposit_date" value="{{ old('deposit_date', get_ymd($cashDeposit->deposit_date ?? null)) }}"
            required>
        @error('deposit_date')
            <div class="valid-feedback text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="depositor_id" class="required"> Depositor ID </label>
        <input type="text" class="form-control @error('date') is-invalid @enderror" id="depositor_id"
            placeholder="enter depositor id" name="depositor_id"
            value="{{ old('depositor_id', $cashDeposit->depositor_id ?? null) }}" required>
        @error('depositor_id')
            <div class="valid-feedback text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="depositor_name" class="required"> Depositor Name </label>
        <input type="text" class="form-control @error('date') is-invalid @enderror" id="depositor_name"
            placeholder="enter depositor name" name="depositor_name"
            value="{{ old('depositor_name', $cashDeposit->depositor_name ?? null) }}" required>
        @error('depositor_name')
            <div class="valid-feedback text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="depositor_mobile_no" class="required"> Depositor Mobile No </label>
        <input type="number" class="form-control @error('date') is-invalid @enderror" id="depositor_mobile_no"
            placeholder="enter depositor mobile no" name="depositor_mobile_no"
            value="{{ old('depositor_mobile_no', $cashDeposit->depositor_mobile_no ?? null) }}" required>
        @error('depositor_mobile_no')
            <div class="valid-feedback text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="depositor_address"> Depositor Address </label>
        <textarea class="form-control @error('date') is-invalid @enderror" rows="3" id="depositor_address"
            placeholder="enter address" name="depositor_address">{{ old('depositor_address', $cashDeposit->depositor_address ?? null) }}</textarea>
        @error('depositor_address')
            <div class="valid-feedback text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="depositor_nid_no"> NID No </label>
        <input type="number" class="form-control @error('date') is-invalid @enderror" id="depositor_nid_no"
            name="depositor_nid_no" placeholder="enter NID No"
            value="{{ old('depositor_nid_no', $cashDeposit->depositor_nid_no ?? null) }}">
        @error('depositor_nid_no')
            <div class="valid-feedback text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="deposit_amount" class="required"> Deposit Amount </label>
        <input type="number" class="form-control @error('date') is-invalid @enderror" id="deposit_amount"
            name="deposit_amount" placeholder="enter deposit amount"
            value="{{ old('deposit_amount', $cashDeposit->deposit_amount ?? null) }}" required>
        @error('deposit_amount')
            <div class="valid-feedback text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
