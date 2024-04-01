<div class="box-body">
    <div class="form-group">
        <label for="deposit_type" class="required"> Deposit Type </label>
        <select class="form-control select2 @error('deposit_type') is-invalid @enderror" style="width: 100%;"
            name="deposit_type" required>
            <option @selected(null == old('depositor_id', $mobileBankingDeposit->deposit_type ?? null))> Select </option>
            <option value="bkash" @selected('bkash' == old('deposit_type', $mobileBankingDeposit->deposit_type ?? null))> Bkash </option>
            <option value="nagad" @selected('nagad' == old('deposit_type', $mobileBankingDeposit->deposit_type ?? null))> Nagad </option>
            <option value="upay" @selected('upay' == old('deposit_type', $mobileBankingDeposit->deposit_type ?? null))> Upay </option>
            <option value="surecash" @selected('surecash' == old('deposit_type', $mobileBankingDeposit->deposit_type ?? null))> SureCash </option>
        </select>
        @error('deposit_type')
            <div class="valid-feedback text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="deposit_date" class="required"> Date </label>
        <input type="date" class="form-control @error('deposit_date') is-invalid @enderror" id="deposit_date"
            placeholder="" name="deposit_date"
            value="{{ old('deposit_date', get_ymd($mobileBankingDeposit->deposit_date ?? null)) }}" required>
        @error('deposit_date')
            <div class="valid-feedback text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="depositor_id" class="required"> Depositor ID </label>
        <input type="text" class="form-control @error('depositor_id') is-invalid @enderror" id="depositor_id"
            placeholder="enter depositor id" name="depositor_id"
            value="{{ old('depositor_id', $mobileBankingDeposit->depositor_id ?? null) }}" required>
        @error('depositor_id')
            <div class="valid-feedback text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="depositor_name" class="required"> Depositor Name </label>
        <input type="text" class="form-control @error('depositor_name') is-invalid @enderror" id="depositor_name"
            placeholder="enter depositor name" name="depositor_name"
            value="{{ old('depositor_name', $mobileBankingDeposit->depositor_name ?? null) }}" required>
        @error('depositor_name')
            <div class="valid-feedback text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="depositor_mobile_no" class="required"> Depositor Mobile No </label>
        <input type="number" class="form-control @error('depositor_mobile_no') is-invalid @enderror"
            id="depositor_mobile_no" placeholder="enter depositor mobile no" name="depositor_mobile_no"
            value="{{ old('depositor_mobile_no', $mobileBankingDeposit->depositor_mobile_no ?? null) }}" required>
        @error('depositor_mobile_no')
            <div class="valid-feedback text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="txid_no" class="required">TXID No </label>
        <input type="number" class="form-control @error('txid_no') is-invalid @enderror" id="txid_no"
            placeholder="enter txid no" name="txid_no"
            value="{{ old('txid_no', $mobileBankingDeposit->txid_no ?? null) }}" required>
        @error('txid_no')
            <div class="valid-feedback text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="depositor_address"> Depositor Address </label>
        <textarea class="form-control @error('depositor_address') is-invalid @enderror" rows="3" id="depositor_address"
            placeholder="enter address" name="depositor_address">{{ old('depositor_address', $mobileBankingDeposit->depositor_address ?? null) }}</textarea>
        @error('depositor_address')
            <div class="valid-feedback text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="depositor_nid_no"> NID No </label>
        <input type="number" class="form-control @error('depositor_nid_no') is-invalid @enderror" id="depositor_nid_no"
            name="depositor_nid_no" placeholder="enter NID No"
            value="{{ old('depositor_nid_no', $mobileBankingDeposit->depositor_nid_no ?? null) }}">
        @error('depositor_nid_no')
            <div class="valid-feedback text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="deposit_amount" class="required"> Deposit Amount </label>
        <input type="number" class="form-control @error('deposit_amount') is-invalid @enderror" id="deposit_amount"
            name="deposit_amount" placeholder="enter deposit amount"
            value="{{ old('deposit_amount', $mobileBankingDeposit->deposit_amount ?? null) }}" required>
        @error('deposit_amount')
            <div class="valid-feedback text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
