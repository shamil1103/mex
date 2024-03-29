@extends('layouts.admin_master')
@section('page-title', 'MEX')
@section('page-css')


@endsection


@section('content')

    <section class="content-header">
        <h1>
            Office Expense
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('pages.home') }}"><i class="fa fa-dashboard"></i> Home </a></li>
            <li><a href="#"> Expense </a></li>
            <li class="active">Office Expense </li>
        </ol>
    </section>

    <!-- Page Header content -->
    <section class="content" style="min-height: auto; margin-top: 20px;">
        <div class="row">
            <div class="col-xs-12">
                <header class="bg-info" style="border-radius: 3px;">
                    <a href="{{ route('office-expense.create') }}"class="btn btn-primary"><i class="fa fa-plus"></i> New
                        Office Expense </a>
                </header>

                <div class="mb" style="margin-bottom: 10px;"></div>

                @include('pages.messages.flash-message')

            </div>
        </div>
    </section>

    <!-- Table content -->
    <section class="content" style="min-height: auto !important;">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title"> </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>SL No </th>
                                    <th>Date </th>
                                    <th>Expense Category </th>
                                    <th>Expense Name </th>
                                    <th>Description </th>
                                    <th>Amount </th>
                                    <th>Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($officeExpenses as $officeExpense)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $officeExpense->expense_date }} </td>
                                        <td>{{ $officeExpense->expense_category->name }} </td>
                                        <td>{{ $officeExpense->expense_name }} </td>
                                        <td>{{ $officeExpense->office_expense_description }} </td>
                                        <td>{{ $officeExpense->office_expense_amount }} </td>
                                        <td>
                                            <a style="padding: 2px"
                                                href="{{ route('office-expense.edit', ['office_expense' => $officeExpense->id]) }}"><i
                                                    class="fa fa-edit"></i></a>
                                            <a target="#" style="padding: 2px" class="delete-btn"
                                                data-id="{{ $officeExpense->id }}"
                                                data-route="{{ route('office-expense.delete') }}"
                                                title="Delete Office Expense"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('page-js')
    <script></script>
@endsection
