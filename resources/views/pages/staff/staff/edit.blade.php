@extends('layouts.admin_master')
@section('page-title', 'MEX')
@section('page-css')


@endsection


@section('content')

    <section class="content-header">
        <h1>
            Update Staff
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('pages.home') }}"><i class="fa fa-dashboard"></i> Home </a></li>
            <li><a href="#"> Deposit </a></li>
            <li><a href="{{ route('staff.index') }}"> Staff </a></li>
            <li class="active">Update </li>
        </ol>
    </section>

    <!-- Page Header content -->
    <section class="content" style="min-height: auto; margin-top: 20px;">
        <div class="row">
            <div class="col-xs-12">
                <div class="mb" style="margin-bottom: 10px;"></div>
                @include('pages.messages.flash-message')
            </div>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Update Staff</h3>
                    </div>
                    <form action="{{ route('staff.update', ['staff' => $staff->id]) }}" method="post"
                        role="form">
                        @csrf
                        @method('patch')
                        @include('pages.staff.staff.form')

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>

@endsection

@section('page-js')
    <script></script>
@endsection
