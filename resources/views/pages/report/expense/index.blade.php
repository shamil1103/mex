@extends('layouts.admin_master')
@section('page-title', 'MEX')
@section('page-css')


@endsection


@section('content')

    <section class="content-header">
        <h1>
            Expense
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('pages.home') }}"><i class="fa fa-dashboard"></i> Home </a></li>
            <li><a href="#"> Expense </a></li>
            <li class="active"> Bank Expense </li>
        </ol>
    </section>

    <!-- Page Header content -->
    <section class="content" style="min-height: auto; margin-top: 20px;">
        <div class="row">
            <div class="col-xs-12">
                <header class="bg-info" style="border-radius: 3px;">
                    <form method="get" action="{{ route('report.expense', request()->getQueryString()) }}">
                        <div class="col-md-12">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label> Expense </label>
                                    <select class="form-control select2" style="width: 100%;" name="expense_status"
                                        id="expense_status" style="font-family: serif;font-weight: bold">
                                        <option value="1" @selected('1' == (isset($expense_status) ? $expense_status : null))>Office</option>
                                        <option value="2" @selected('2' == (isset($expense_status) ? $expense_status : null))>Marketing</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2 @if (!(isset($expense_status) && $expense_status == 2)) d-none @endif" id="staff_id_div">
                                <div class="form-group">
                                    <label> Staff </label>
                                    <select class="form-control select2" style="width: 100%;" name="staff_id"
                                        id="staff_id">
                                        <option value=""> All </option>
                                        @foreach ($staffs as $staff)
                                            <option value="{{ $staff->id }}" @selected($staff->id == (isset($staff_id) ? $staff_id : null))>
                                                {{ $staff->staff_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2 @if (isset($expense_status) && $expense_status == 2) d-none @endif"
                                id="expense_category_id_div">
                                <div class="form-group">
                                    <label> Expense Category </label>
                                    <select class="form-control select2" style="width: 100%;" name="expense_category_id"
                                        id="expense_category_id">
                                        <option value=""> All </option>
                                        @foreach ($expenseCategories as $expenseCategory)
                                            <option value="{{ $expenseCategory->id }}" @selected($expenseCategory->id == (isset($expense_category_id) ? $expense_category_id : null))>
                                                {{ $expenseCategory->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
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
                                <a href="{{ route('report.expense') }}" class="btn btn-warning" style="margin-top: 23px">
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

    @if (isset($expense_status))
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
                            @if ($expense_status == 1)
                                @include('pages.report.expense.office-expense')
                            @else
                                @include('pages.report.expense.marketing-expense')
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
        $(document).on('change', '#expense_status', function() {

            let expense_status = $(this).find('option:selected').val();
            if (expense_status == 2) {
                $("#staff_id_div").removeClass('d-none');
                $("#expense_category_id_div").addClass('d-none');
            } else {
                $("#expense_category_id_div").removeClass('d-none');
                $("#staff_id_div").addClass('d-none');
            }
        });
    </script>
@endsection
