@extends('layouts.admin_master')
@section('page-title', 'MEX')
@section('page-css')


@endsection


@section('content')

    <section class="content-header">
        <h1>
            Others Loan
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('pages.home') }}"><i class="fa fa-dashboard"></i> Home </a></li>
            <li><a href="#"> Loan </a></li>
            <li class="active">Others Loan </li>
        </ol>
    </section>

    <!-- Page Header content -->
    <section class="content" style="min-height: auto; margin-top: 20px;">
        <div class="row">
            <div class="col-xs-12">
                <header class="bg-info" style="border-radius: 3px;">
                    <a href="{{ route('others-loan.create') }}"class="btn btn-primary"><i class="fa fa-plus"></i> New Others
                        Loan </a>
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
                                @foreach ($othersLoans as $othersLoan)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $othersLoan->loan_date }}</td>
                                        <td>{{ $othersLoan->loan_name }}</td>
                                        <td>{{ $othersLoan->loan_address }}</td>
                                        <td>{{ $othersLoan->loan_reference }}</td>
                                        <td>{{ $othersLoan->loan_description }}</td>
                                        <td>{{ $othersLoan->loan_amount }}</td>
                                        <td>
                                            <a style="padding: 2px"
                                                href="{{ route('others-loan.edit', ['others_loan' => $othersLoan->id]) }}"><i
                                                    class="fa fa-edit"></i></a>
                                            <a target="#" style="padding: 2px" class="delete-btn"
                                                data-id="{{ $othersLoan->id }}"
                                                data-route="{{ route('others-loan.delete') }}"
                                                title="Delete Others Loan"><i class="fa fa-trash"></i></a>
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
