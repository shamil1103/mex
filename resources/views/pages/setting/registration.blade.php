@extends('layouts.admin_master')
@section('page-title', 'MEX')
@section('page-css')


@endsection


@section('content')

    <section class="content-header">
        <h1>
            Setting
            <!-- <small>Preview</small> -->
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('pages.home') }}"><i class="fa fa-dashboard"></i> Home </a></li>
            <li><a href="#"> Setting </a></li>
            <li class="active"> User Registration </li>
        </ol>
    </section>

    <!-- Page Header content -->
    <section class="content" style="min-height: auto; margin-top: 20px;">
        <div class="row">
            <div class="col-xs-12">
                <header class="bg-info" style="border-radius: 3px;">
                    <a href="" typy="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#modal-default"><i class="fa fa-plus"></i> Registration</a>
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
                    <h4 class="modal-title"> User Registration Form </h4>
                </div>



                <div class="modal-body">

                    <form role="form" action="{{ route('register') }}" method="post">
                        @csrf

                        <div class="box-body">
                            <div class="form-group">
                                <label for="userName" class="required"> User Name </label>
                                <input type="text" class="form-control" id="userName" placeholder="enter user name"
                                    name="name" required>
                                @error('name')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="emailAddress" class="required"> Email address </label>
                                <input type="email" class="form-control" id="emailAddress" name="email"
                                    placeholder="enter email address" required>
                                @error('email')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password" class="required"> Password </label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="enter password" required>
                                @error('password')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password" class="required"> Confirm Password </label>
                                <input type="password" class="form-control" id="password" name="password_confirmation"
                                    placeholder="enter confirm password" required>
                                @error('password_confirmation')
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
                                    <th>Username</th>
                                    <th>Email ID </th>
                                    <!-- <th>Password </th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($users) > 0)
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->id }} </td>
                                            <td> {{ $user->name }} </td>
                                            <td> {{ $user->email }} </td>
                                            <!-- <td> {{ $user->password }} </td> -->
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
    <script>
        //  $('#modal-default').modal({backdrop: 'static', keyboard: false}, 'show');
    </script>
@endsection
