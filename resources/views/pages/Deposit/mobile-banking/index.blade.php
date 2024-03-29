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
            <li class="active">Mobile Banking Deposit </li>
        </ol>
    </section>

    <!-- Page Header content -->
    <section class="content" style="min-height: auto; margin-top: 20px;">
        <div class="row">
            <div class="col-xs-12">
                <header class="bg-info" style="border-radius: 3px;">
                    <a href="{{ route('mobile-banking-deposit.create') }}"class="btn btn-primary"><i class="fa fa-plus"></i>
                        New Mobile Banking Deposit
                    </a>
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
                                    <th>Deposit Mobile No </th>
                                    <th>TXID No </th>
                                    <th>Address </th>
                                    <th>NID No </th>
                                    <th>Deposit Amount </th>
                                    <th>Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($mobileBankingDeposits) > 0)
                                    @foreach ($mobileBankingDeposits as $mobileBankingDeposit)
                                        <tr>
                                            <td>{{ $mobileBankingDeposit->id }}</td>
                                            <td>{{ $mobileBankingDeposit->deposit_type }}</td>
                                            <td>{{ $mobileBankingDeposit->deposit_date }}</td>
                                            <td>{{ $mobileBankingDeposit->depositor_id }}</td>
                                            <td>{{ $mobileBankingDeposit->depositor_name }}</td>
                                            <td>{{ $mobileBankingDeposit->deposit_mobile_no }}</td>
                                            <td>{{ $mobileBankingDeposit->txid_no }}</td>
                                            <td>{{ $mobileBankingDeposit->depositor_address }}</td>
                                            <td>{{ $mobileBankingDeposit->depositor_nid_no }}</td>
                                            <td>{{ $mobileBankingDeposit->deposit_amount }}</td>
                                            <td>
                                                <a style="padding: 2px"
                                                    href="{{ route('mobile-banking-deposit.edit', ['mobile_banking_deposit' => $mobileBankingDeposit->id]) }}"><i
                                                        class="fa fa-edit"></i></a>
                                                <a target="#" style="padding: 2px" class="delete-btn"
                                                    data-id="{{ $mobileBankingDeposit->id }}"
                                                    data-route="{{ route('mobile-banking-deposit.delete') }}"
                                                    title="Delete Mobile Banking Deposit"><i class="fa fa-trash"></i></a>
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
