@extends('layouts.admin_master')
@section('page-title', 'MEX')
@section('page-css')


@endsection


@section('content')

    <section class="content-header">
        <h1>
            Staff
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('pages.home') }}"><i class="fa fa-dashboard"></i> Home </a></li>
            <li><a href="#"> Staff </a></li>
            <li class="active">Staff </li>
        </ol>
    </section>

    <!-- Page Header content -->
    <section class="content" style="min-height: auto; margin-top: 20px;">
        <div class="row">
            <div class="col-xs-12">
                <header class="bg-info" style="border-radius: 3px;">
                    <a href="{{ route('staff.create') }}"class="btn btn-primary"><i class="fa fa-plus"></i> New Staff </a>
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
                                    <th>Deposit Type </th>
                                    <th>Date </th>
                                    <th>Depositor ID </th>
                                    <th>Depositor Name </th>
                                    <th>Depositor Mobile No </th>
                                    <th>Bank Name </th>
                                    <th>Address </th>
                                    <th>NID No </th>
                                    <th>Deposit Amount </th>
                                    <th>Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($bankDeposits) > 0)
                                    @foreach ($bankDeposits as $bankDeposit)
                                        <tr>
                                            <td>{{ $bankDeposit->id }}</td>
                                            <td>{{ $bankDeposit->deposit_type }}</td>
                                            <td>{{ $bankDeposit->deposit_date }}</td>
                                            <td>{{ $bankDeposit->depositor_id }}</td>
                                            <td>{{ $bankDeposit->depositor_name }}</td>
                                            <td>{{ $bankDeposit->depositor_mobile_no }}</td>
                                            <td>{{ $bankDeposit->bank_name }}</td>
                                            <td>{{ $bankDeposit->depositor_description }}</td>
                                            <td>{{ $bankDeposit->depositor_nid_no }}</td>
                                            <td>{{ $bankDeposit->deposit_amount }}</td>
                                            <td>
                                                <a style="padding: 2px"
                                                    href="{{ route('bank-deposit.edit', ['bank_deposit' => $bankDeposit->id]) }}"><i
                                                        class="fa fa-edit"></i></a>
                                                <a target="#" style="padding: 2px" class="delete-btn"
                                                    data-id="{{ $bankDeposit->id }}"
                                                    data-route="{{ route('bank-deposit.delete') }}"
                                                    title="Delete Bank Deposit"><i class="fa fa-trash"></i></a>
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
