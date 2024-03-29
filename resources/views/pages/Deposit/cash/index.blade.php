@extends('layouts.admin_master')
@section('page-title', 'MEX')
@section('page-css')


@endsection


@section('content')

    <section class="content-header">
        <h1>
            Deposit
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('pages.home') }}"><i class="fa fa-dashboard"></i> Home </a></li>
            <li><a href="#"> Deposit </a></li>
            <li class="active"> Cash Deposit </li>
        </ol>
    </section>

    <!-- Page Header content -->
    <section class="content" style="min-height: auto; margin-top: 20px;">
        <div class="row">
            <div class="col-xs-12">
                <header class="bg-info" style="border-radius: 3px;">
                    <a href="{{ route('cash-deposit.create') }}"class="btn btn-primary"><i class="fa fa-plus"></i> New Cash
                        Deposit </a>
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
                                    <th>Address </th>
                                    <th>NID No </th>
                                    <th>Deposit Amount </th>
                                    <th>Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($cashDeposits) > 0)
                                    @foreach ($cashDeposits as $cashDeposit)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $cashDeposit->deposit_type }}</td>
                                            <td>{{ $cashDeposit->deposit_date }}</td>
                                            <td>{{ $cashDeposit->depositor_id }}</td>
                                            <td>{{ $cashDeposit->depositor_name }}</td>
                                            <td>{{ $cashDeposit->depositor_mobile_no }}</td>
                                            <td>{{ $cashDeposit->depositor_address }}</td>
                                            <td>{{ $cashDeposit->depositor_nid_no }}</td>
                                            <td>{{ $cashDeposit->deposit_amount }}</td>
                                            <td>
                                                <a style="padding: 2px"
                                                    href="{{ route('cash-deposit.edit', ['cash_deposit' => $cashDeposit->id]) }}"><i
                                                        class="fa fa-edit"></i></a>
                                                <a target="#" style="padding: 2px" class="delete-btn"
                                                    data-id="{{ $cashDeposit->id }}"
                                                    data-route="{{ route('cash-deposit.delete') }}"
                                                    title="Delete Cash Deposit"><i class="fa fa-trash"></i></a>
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
