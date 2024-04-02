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
            $totalExpenseAmount = 0;
        @endphp
        @foreach ($othersLoans as $othersLoan)
            @php
                $totalExpenseAmount += $othersLoan->marketing_expense_amount;
            @endphp
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $othersLoan->loan_date }}</td>
                <td>{{ $othersLoan->loan_name }}</td>
                <td>{{ $othersLoan->loan_address }}</td>
                <td>{{ $othersLoan->loan_reference }}</td>
                <td>{{ $othersLoan->loan_description }}</td>
                <td>{{ number_format($othersLoan->loan_amount, 2) }} </td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th colspan="6" class="text-center">Total </th>
            <th>{{ number_format($totalExpenseAmount, 2) }}</th>
        </tr>
    </tfoot>
</table>
