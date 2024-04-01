<table id="example1" class="table table-bordered table-striped table-hover">
    <thead>
        <tr>
            <th>SL No </th>
            <th>Deposit Type </th>
            <th>Date </th>
            <th>Depositor ID </th>
            <th>Depositor Name </th>
            <th>Depositor Mobile No </th>
            <th>Bank Name </th>
            <th>Address </th>
            <th>NID No </th>
            <th>Deposit Amount </th>
        </tr>
    </thead>
    <tbody>
        @php
            $totalDepositAmount = 0;
        @endphp
        @foreach ($bankDeposits as $bankDeposit)
            @php
                $totalDepositAmount += $bankDeposit->deposit_amount;
            @endphp
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $bankDeposit->deposit_type }}</td>
                <td>{{ $bankDeposit->deposit_date }}</td>
                <td>{{ $bankDeposit->depositor_id }}</td>
                <td>{{ $bankDeposit->depositor_name }}</td>
                <td>{{ $bankDeposit->depositor_mobile_no }}</td>
                <td>{{ $bankDeposit->bank_name }}</td>
                <td>{{ $bankDeposit->depositor_description }}</td>
                <td>{{ $bankDeposit->depositor_nid_no }}</td>
                <td>{{ number_format($bankDeposit->deposit_amount, 2) }}</td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th colspan="9" class="text-center">Total </th>
            <th>{{ number_format($totalDepositAmount, 2) }}</th>
        </tr>
    </tfoot>
</table>
