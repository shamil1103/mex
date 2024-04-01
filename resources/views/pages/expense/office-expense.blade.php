@extends('layouts.admin_master')
@section('page-title', 'MEX')
@section('page-css')


@endsection


@section('content')

    <section class="content-header">
        <h1>
            Expense
            <!-- <small>Preview</small> -->
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('pages.home') }}"><i class="fa fa-dashboard"></i> Home </a></li>
            <li><a href="#"> Expense </a></li>
            <li class="active"> Office Expense </li>
        </ol>
    </section>

    <!-- Page Header content -->
    <section class="content" style="min-height: auto; margin-top: 20px;">
        <div class="row">
            <div class="col-xs-12">
                <header class="bg-info" style="border-radius: 3px;">
                    <a href="" typy="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#modal-default"><i class="fa fa-plus"></i> New Office Expense</a>
                </header>

                <div class="mb" style="margin-bottom: 10px;"></div>

                {{-- for error messages --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {{-- for flash messages --}}
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
                    <h4 class="modal-title"> Office Expense Form </h4>
                </div>
                <div class="modal-body">

                    <form role="form" action="{{ route('office-expense.store') }}" method="post">
                        @csrf

                        <div class="box-body">

                            <div class="form-group">
                                <!-- <label for="expense_id" class="required"> Expense ID </label>
                      <input type="text" class="form-control" id="expense_id" placeholder=" enter expense name" name="expense_id" disabled> -->

                                <!-- @error(' ')
        <span>{{ $message }}</span>
    @enderror -->
                            </div>

                            <div class="form-group">

                                <label class="required"> Date </label>
                                <!-- <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="date" class="form-control pull-right" id="datepicker" name="expense_date" required>
                      </div> -->
                                <input type="date" class="form-control pull-right" id="" name="expense_date"
                                    required>

                                @error(' ')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="expense_category_id" class="required"> Expense Category </label>
                                <select class="form-control select2" style="width: 100%;" id="expense_category_id"
                                    name="expense_category_id" required>
                                    <option selected="selected" value="" selected> Select </option>
                                    <?php
                                    if (count($expenseCats) > 0) {
                                        foreach ($expenseCats as $expensecategoryData) {
                                            echo '<option value="' . $expensecategoryData->expense_category_id . '">' . $expensecategoryData->expense_category_name . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                                @error(' ')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="expense_name" class="required"> Expense Name </label>
                                <input type="text" class="form-control" id="expense_name"
                                    placeholder=" enter expense name" name="expense_name" required>

                                @error(' ')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="office_expense_description">Description </label>
                                <textarea class="form-control" rows="3" placeholder="enter description" id="office_expense_description"
                                    name="office_expense_description"></textarea>

                                <!-- @error(' ')
        <span>{{ $message }}</span>
    @enderror -->
                            </div>
                            <div class="form-group">
                                <label for="office_expense_amount" class="required"> Expense Amount </label>
                                <input type="number" class="form-control" id="office_expense_amount"
                                    placeholder="enter expense amount" name="office_expense_amount" required>

                                @error(' ')
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
                                    <th> SL No </th>
                                    <!-- <th>Expense ID </th> -->
                                    <th>Date </th>
                                    <th>Expense Category </th>
                                    <th>Expense Name </th>
                                    <th>Descrition </th>
                                    <th>Amount </th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($officeexpense) > 0)
                                    @foreach ($officeexpense as $officeexpense)
                                        <tr>
                                            <td>{{ $officeexpense->id }} </td>
                                            <td>{{ $officeexpense->expense_date }} </td>
                                            <td>{{ $officeexpense->expense_cats->expense_category_name }} </td>
                                            <td>{{ $officeexpense->expense_name }} </td>
                                            <td>{{ $officeexpense->office_expense_description }} </td>
                                            <td>{{ $officeexpense->office_expense_amount }} </td>
                                            <td> <a href="#"><i class="fa fa-edit"></i></a> | <a href="#"><i
                                                        class="fa fa-trash"></i></a> </td>
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
