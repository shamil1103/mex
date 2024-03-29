@extends('layouts.admin_master')
@section("page-title", "MEX")
@section('page-css')


@endsection


@section('content')

    <section class="content-header">
      <h1>
      Loan
        <!-- <small>Preview</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route ('pages.home') }}"><i class="fa fa-dashboard"></i> Home </a></li>
        <li><a href="#"> Loan </a></li>
        <li class="active"> Others Loan </li>
      </ol>
    </section>

    <!-- Page Header content -->
    <section class="content" style="min-height: auto; margin-top: 20px;">
      <div class="row">
        <div class="col-xs-12">
          <header class="bg-info" style="border-radius: 3px;">
            <a href="" typy="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus"></i> New Others Loan </a>
          </header>

          <div class="mb" style="margin-bottom: 10px;"></div>

          {{--for error messages--}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {{--for flash messages--}}
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
            <h4 class="modal-title"> Staff Loan Form </h4>
          </div>
          <div class="modal-body">

            <form role="form" action="{{ route('others-loan.index') }}" method="post">
              @csrf

              <div class="box-body">

                <div class="form-group">
                  <label class="required"> Date </label>
                  <input type="date" class="form-control pull-right" id="" name="loan_date" required>

                  @error(' ')
                  <span>{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="loan_name" class="required"> Name </label>
                  <input type="text" class="form-control pull-right" id="loan_name" placeholder="enter name" name="loan_name" required>

                  @error(' ')
                  <span>{{ $message }}</span>
                  @enderror
                </div>


                <div class="form-group">
                  <label for="loan_address" class=" "> Address </label>
                  <textarea class="form-control" rows="3" placeholder="enter address" id="loan_address" name="loan_address" ></textarea>

                  @error(' ')
                  <span>{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="loan_reference" class="required"> Reference </label>
                  <input type="text" class="form-control" id="loan_reference" placeholder=" enter reference name" name="loan_reference" required>

                  @error('Enter Leader Name ')
                  <span>{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="loan_description">Description </label>
                  <textarea class="form-control" rows="3" placeholder="enter description" id="loan_description" name="loan_description"></textarea>

                  @error(' ')
                  <span>{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="loan_amount" class="required"> Expense Amount </label>
                  <input type="number" class="form-control" id="loan_amount" placeholder="enter loan amount" name="loan_amount" required>

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
              <h3 class="box-title">  </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>SL No </th>
                  <th> Date </th>
                  <th> Name </th>
                  <th> Address </th>
                  <th> Reference </th>
                  <th> Descrition </th>
                  <th> Amount </th>
                  <th> Action</th>
                </tr>
                </thead>
                <tbody>

                  @if(count($othersloan)>0)
                    @foreach($othersloan as $othersloan)
                    <tr>
                      <td>{{ $othersloan->id }}</td>
                      <td>{{ $othersloan->loan_date }}</td>
                      <td>{{ $othersloan->loan_name }}</td>
                      <td>{{ $othersloan->loan_address }}</td>
                      <td>{{ $othersloan->loan_reference }}</td>
                      <td>{{ $othersloan->loan_description }}</td>
                      <td>{{ $othersloan->loan_amount }}</td>
                      <td> <a href="#"><i class="fa fa-edit"></i></a> | <a href="#"><i class="fa fa-trash"></i></a> </td>

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

    </script>
    @endsection
