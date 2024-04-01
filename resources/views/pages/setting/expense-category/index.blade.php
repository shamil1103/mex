@extends('layouts.admin_master')
@section('page-title', 'MEX')
@section('page-css')


@endsection


@section('content')

    <section class="content-header">
        <h1>
            Expense Category
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('pages.home') }}"><i class="fa fa-dashboard"></i> Home </a></li>
            <li><a href="#"> Settings</a></li>
            <li class="active">Expense Category </li>
        </ol>
    </section>

    <!-- Page Header content -->
    <section class="content" style="min-height: auto; margin-top: 20px;">
        <div class="row">
            <div class="col-xs-12">
                <header class="bg-info" style="border-radius: 3px;">
                    <a href="{{ route('expense-category.create') }}"class="btn btn-primary"><i class="fa fa-plus"></i> New
                        Expense
                        Category </a>
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
                                    <th>Name</th>
                                    <th>Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($expenseCategories as $expenseCategory)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $expenseCategory->name }}</td>
                                        <td>
                                            <a style="padding: 2px"
                                                href="{{ route('expense-category.edit', ['expense_category' => $expenseCategory->id]) }}"><i
                                                    class="fa fa-edit"></i></a>
                                            <a target="#" style="padding: 2px" class="delete-btn"
                                                data-id="{{ $expenseCategory->id }}"
                                                data-route="{{ route('expense-category.delete') }}"
                                                title="Delete Expense Category"><i class="fa fa-trash"></i></a>
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
