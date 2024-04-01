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
            <li class="active"> Bank Deposit </li>
        </ol>
    </section>

    <!-- Page Header content -->
    <section class="content" style="min-height: auto; margin-top: 20px;">
        <div class="row">
            <div class="col-xs-12">
                <header class="bg-info" style="border-radius: 3px;">
                    <form method="get" action="{{ route('report.deposit', request()->getQueryString()) }}">
                        <div class="col-md-12">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label> Deposit </label>
                                    <select class="form-control select2" style="width: 100%;" name="deposit_status"
                                        id="deposit_status" style="font-family: serif;font-weight: bold">
                                        <option value="1" @selected('1' == (isset($deposit_status) ? $deposit_status : null) )>Cash</option>
                                        <option value="2" @selected('2' == (isset($deposit_status) ? $deposit_status : null) )>Bank</option>
                                        <option value="3" @selected('3' == (isset($deposit_status) ? $deposit_status : null) )>Mobile Banking</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 @if(!(isset($deposit_status) && $deposit_status == 3)) d-none @endif" id="deposit_type_div">
                                <div class="form-group">
                                    <label> Deposit Type </label>
                                    <select class="form-control select2" style="width: 100%;" name="deposit_type"
                                        id="deposit_type">
                                        <option value=""> All </option>
                                        <option value="bkash" @selected('bkash' == (isset($deposit_type) ? $deposit_type : null) )> Bkash </option>
                                        <option value="nagad" @selected('nagad' == (isset($deposit_type) ? $deposit_type : null) )> Nagad </option>
                                        <option value="upay" @selected('upay' == (isset($deposit_type) ? $deposit_type : null) )> Upay </option>
                                        <option value="surecash" @selected('surecash' == (isset($deposit_type) ? $deposit_type : null) )> SureCash </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="dateTimeRange">
                                        <span style="color: green;"> <i class="fa fa-calendar-check-o"></i></span> Date
                                    </label>
                                    <input type="text" name="dateTimeRange" id="dateTimeRange"
                                        value="{{ isset($dateTimeRange) ? $dateTimeRange : null }}"
                                        class="form-control text-bold reportrange">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary" style="margin-top: 23px">
                                    <i class="fa fa-search"></i> Search
                                </button>
                                <a href="{{ route('report.deposit') }}" class="btn btn-warning" style="margin-top: 23px">
                                    <i class="fa fa-refresh"></i> Reset
                                </a>
                            </div>
                        </div>
                    </form>
                </header>

                <div class="mb" style="margin-bottom: 10px;"></div>

                @include('pages.messages.flash-message')

            </div>
        </div>
    </section>

    @if (isset($deposit_status))
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
                            @if ($deposit_status == 1)
                                @include('pages.report.deposit.cash-deposit')
                            @elseif($deposit_status == 2)
                                @include('pages.report.deposit.bank-deposit')
                            @else
                                @include('pages.report.deposit.mobile-banking-deposit')
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif


@endsection

@section('page-js')
    <script>
        $(document).on('change', '#deposit_status', function() {

            let deposit_status = $(this).find('option:selected').val();
            if (deposit_status == 3) {
                $("#deposit_type_div").removeClass('d-none');
            } else {
                $("#deposit_type_div").addClass('d-none');
            }
        });
    </script>
@endsection
