<table id="example1" class="table table-bordered table-striped table-hover">
    <thead>
        <tr>
            <th>SL No </th>
            <th>Deposit Type </th>
            <th>Date </th>
            <th>Depositor ID </th>
            <th>Depositor Name </th>
            <th>Deposit Mobile No </th>
            <th>TXID No </th>
            <th>Address </th>
            <th>NID No </th>
            <th>Deposit Amount </th>
        </tr>
    </thead>
    <tbody>
        @php
            $totalDepositAmount = 0;
        @endphp
        @foreach ($mobileBankingDeposits as $mobileBankingDeposit)
            @php
                $totalDepositAmount += $mobileBankingDeposit->deposit_amount;
            @endphp
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $mobileBankingDeposit->deposit_type }}</td>
                <td>{{ $mobileBankingDeposit->deposit_date }}</td>
                <td>{{ $mobileBankingDeposit->depositor_id }}</td>
                <td>{{ $mobileBankingDeposit->depositor_name }}</td>
                <td>{{ $mobileBankingDeposit->deposit_mobile_no }}</td>
                <td>{{ $mobileBankingDeposit->txid_no }}</td>
                <td>{{ $mobileBankingDeposit->depositor_address }}</td>
                <td>{{ $mobileBankingDeposit->depositor_nid_no }}</td>
                <td>{{ number_format($mobileBankingDeposit->deposit_amount, 2) }}</td>
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
