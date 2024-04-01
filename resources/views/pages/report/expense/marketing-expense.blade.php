<table id="example1" class="table table-bordered table-striped table-hover">
    <thead>
        <tr>
            <th>SL No </th>
            <th>Date </th>
            <th>Expense Category </th>
            <th>Expense Name </th>
            <th>Description </th>
            <th>Amount </th>
        </tr>
    </thead>
    <tbody>
        @php
            $totalExpenseAmount = 0;
        @endphp
        @foreach ($marketingExpenses as $marketingExpense)
            @php
                $totalExpenseAmount += $marketingExpense->marketing_expense_amount;
            @endphp
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $marketingExpense->marketing_expense_date }} </td>
                <td>{{ $marketingExpense->staff->staff_name }} </td>
                <td>{{ $marketingExpense->expense_name }} </td>
                <td>{{ $marketingExpense->marketing_expense_description }} </td>
                <td>{{ number_format($marketingExpense->marketing_expense_amount,2) }} </td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th colspan="5" class="text-center">Total </th>
            <th>{{ number_format($totalExpenseAmount, 2) }}</th>
        </tr>
    </tfoot>
</table>
