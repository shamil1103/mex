@extends('layouts.admin_master')
@section('page-title', 'MEX')
@section('page-css')


@endsection


@section('content')

    <section class="content-header">
        <h1>
            Staff Loan
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('pages.home') }}"><i class="fa fa-dashboard"></i> Home </a></li>
            <li><a href="#"> Loan </a></li>
            <li class="active">Staff Loan </li>
        </ol>
    </section>

    <!-- Page Header content -->
    <section class="content" style="min-height: auto; margin-top: 20px;">
        <div class="row">
            <div class="col-xs-12">
                <header class="bg-info" style="border-radius: 3px;">
                    <a href="{{ route('staff-loan.create') }}"class="btn btn-primary"><i class="fa fa-plus"></i> New Staff Loan </a>
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
                                    <th>Staff Name </th>
                                    <th>Staff Address </th>
                                    <th>Description </th>
                                    <th>Leader Name </th>
                                    <th>Amount </th>
                                    <th>Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($staffLoans) > 0)
                                    @foreach ($staffLoans as $staffLoan)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $staffLoan->staff_loan_date }}</td>
                                            <td>{{ $staffLoan->staff->staff_name }}</td>
                                            <td>{{ $staffLoan->staff_address }}</td>
                                            <td>{{ $staffLoan->staff_loan_description }}</td>
                                            <td>{{ $staffLoan->staff_leader_name }}</td>
                                            <td>{{ $staffLoan->staff_loan_amount }}</td>
                                            <td>
                                                <a style="padding: 2px"
                                                    href="{{ route('staff-loan.edit', ['staff_loan' => $staffLoan->id]) }}"><i
                                                        class="fa fa-edit"></i></a>
                                                <a target="#" style="padding: 2px" class="delete-btn"
                                                    data-id="{{ $staffLoan->id }}"
                                                    data-route="{{ route('staff-loan.delete') }}" title="Delete Staff Loan"><i
                                                        class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
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
