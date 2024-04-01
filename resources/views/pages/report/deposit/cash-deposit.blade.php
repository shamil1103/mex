<table id="example1" class="table table-bordered table-striped table-hover">
    <thead>
        <tr>
            <th>SL No </th>
            <th>Deposit Type </th>
            <th>Date </th>
            <th>Depositor ID </th>
            <th>Depositor Name </th>
            <th>Depositor Mobile No </th>
            <th>Address </th>
            <th>NID No </th>
            <th>Deposit Amount </th>
        </tr>
    </thead>
    <tbody>
        @php
            $totalDepositAmount = 0;
        @endphp
        @foreach ($cashDeposits as $cashDeposit)
            @php
                $totalDepositAmount += $cashDeposit->deposit_amount;
            @endphp
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $cashDeposit->deposit_type }}</td>
                <td>{{ $cashDeposit->deposit_date }}</td>
                <td>{{ $cashDeposit->depositor_id }}</td>
                <td>{{ $cashDeposit->depositor_name }}</td>
                <td>{{ $cashDeposit->depositor_mobile_no }}</td>
                <td>{{ $cashDeposit->depositor_address }}</td>
                <td>{{ $cashDeposit->depositor_nid_no }}</td>
                <td>{{ number_format($cashDeposit->deposit_amount, 2) }}</td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th colspan="8" class="text-center">Total </th>
            <th>{{ number_format($totalDepositAmount, 2) }}</th>
        </tr>
    </tfoot>
</table>
