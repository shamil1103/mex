<table id="example1" class="table table-bordered table-striped table-hover">
    <thead>
        <tr>
            <th>SL No </th>
            <th>Date </th>
            <th>Staff Name </th>
            <th>Staff Address </th>
            <th>Description </th>
            <th>Leader Name </th>
            <th>Amount </th>
        </tr>
    </thead>
    <tbody>
        @php
            $totalLoanAmount = 0;
        @endphp
        @foreach ($staffLoans as $staffLoan)
            @php
                $totalLoanAmount += $staffLoan->staff_loan_amount;
            @endphp
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $staffLoan->staff_loan_date }}</td>
                <td>{{ $staffLoan->staff->staff_name }}</td>
                <td>{{ $staffLoan->staff_address }}</td>
                <td>{{ $staffLoan->staff_loan_description }}</td>
                <td>{{ $staffLoan->staff_leader_name }}</td>
                <td>{{ number_format($staffLoan->staff_loan_amount, 2) }} </td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th colspan="6" class="text-center">Total </th>
            <th>{{ number_format($totalLoanAmount, 2) }}</th>
        </tr>
    </tfoot>
</table>
