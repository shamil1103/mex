@extends('layouts.admin_master')
@section('page-title', 'MEX')
@section('page-css')


@endsection


@section('content')

    <section class="content-header">
        <h1>
            Deposit
            <!-- <small>Preview</small> -->
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
                    <a href="{{ route('cash-deposit.create') }}"class="btn btn-primary"><i class="fa fa-plus"></i> New Cash Deposit </a>
                </header>

                <div class="mb" style="margin-bottom: 10px;"></div>

                @include('pages.messages.flash-message')

            </div>
        </div>
    </section>
    <!-- Modal Form -->
    <div class="modal fade" id="modal-default" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa fa-close"></i></span></button>
                    <h4 class="modal-title"> Cash Deposit Form </h4>
                </div>
                <div class="modal-body">

                    <form role="form" action="{{ route('cash-deposit.store') }}" method="post">
                        @csrf

                        <div class="box-body">

                            <div class="form-group">
                                <label for="deposit_type" class="required"> Deposit Type </label>
                                <input type="text" class="form-control" id="deposit_type" placeholder=" "
                                    name="deposit_type" value="Cash" required>
                                @error('id')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="deposit_date" class="required"> Date </label>
                                <input type="date" class="form-control" id="deposit_date" placeholder=" "
                                    name="deposit_date" required>
                                @error('date')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="depositor_id" class="required"> Depositor ID </label>
                                <input type="text" class="form-control" id="depositor_id"
                                    placeholder="enter depositor id" name="depositor_id" required>
                                @error('id')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="depositor_name" class="required"> Depositor Name </label>
                                <input type="text" class="form-control" id="depositor_name"
                                    placeholder="enter depositor name" name="depositor_name" required>
                                @error('name')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="depositor_mobile_no" class="required"> Depositor Mobile No </label>
                                <input type="number" class="form-control" id="depositor_mobile_no"
                                    placeholder="enter depositor mobile no" name="depositor_mobile_no" required>
                                @error('mobile_no')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="depositor_address"> Depositor Address </label>
                                <textarea class="form-control" rows="3" id="depositor_address" placeholder="enter address"
                                    name="depositor_address"></textarea>
                                @error('address')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="depositor_nid_no"> NID No </label>
                                <input type="number" class="form-control" id="depositor_nid_no" name="depositor_nid_no"
                                    placeholder="enter NID No">
                                @error('nid_no')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="deposit_amount" class="required"> Deposit Amount </label>
                                <input type="number" class="form-control" id="deposit_amount" name="deposit_amount"
                                    placeholder="enter deposit amount" required>
                                @error('amount')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class=" text-center">
                            <button type="submit" class="btn btn-primary"> Save </button>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

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
                                            <td>{{ $cashDeposit->id }}</td>
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
                                                <a target="#"  style="padding: 2px" class="delete-btn" data-id="{{ $cashDeposit->id }}"
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