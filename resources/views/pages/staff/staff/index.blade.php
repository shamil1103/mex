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
                                    <th>Staff ID</th>
                                    <th>Staff Name </th>
                                    <th>Staff Mobile No </th>
                                    <th>Address </th>
                                    <th>NID No </th>
                                    <th>Email ID </th>
                                    <th>Staff Salary </th>
                                    <th>Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($staffs) > 0)
                                    @foreach ($staffs as $staff)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $staff->staff_id }}</td>
                                            <td>{{ $staff->staff_name }}</td>
                                            <td>{{ $staff->staff_mobile_no }}</td>
                                            <td>{{ $staff->staff_address }}</td>
                                            <td>{{ $staff->staff_nid_no }}</td>
                                            <td>{{ $staff->staff_email_address }}</td>
                                            <td>{{ $staff->staff_salary_amount }}</td>
                                            <td>
                                                <a style="padding: 2px"
                                                    href="{{ route('staff.edit', ['staff' => $staff->id]) }}"><i
                                                        class="fa fa-edit"></i></a>
                                                <a target="#" style="padding: 2px" class="delete-btn"
                                                    data-id="{{ $staff->id }}" data-route="{{ route('staff.delete') }}"
                                                    title="Delete Staff"><i class="fa fa-trash"></i></a>
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
