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
        <li class="active"> Staff Loan </li>
      </ol>
    </section>

    <!-- Page Header content -->
    <section class="content" style="min-height: auto; margin-top: 20px;">
      <div class="row">
        <div class="col-xs-12">
          <header class="bg-info" style="border-radius: 3px;">
            <a href="" typy="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus"></i> New Staff Loan </a>
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

            <form role="form" action="{{ route('staffloan.index') }}" method="post">
              @csrf

              <div class="box-body">

                <div class="form-group">
                  <!-- <label for="expense_id" class="required"> Expense ID </label>
                  <input type="text" class="form-control" id="expense_id" placeholder=" auto generate" name="expense_id" disabled> -->
                 
                  <!-- @error(' ')  
                  <span>{{ $message }}</span>
                  @enderror -->
                </div>

                <div class="form-group">
                  <label class="required"> Date </label>
                  <input type="date" class="form-control pull-right" id="" name="staff_loan_date" required>

                  <!-- @error(' ')  
                  <span>{{ $message }}</span>
                  @enderror -->
                </div>
                
                <div class="form-group">
                  <label for="staff_id" class="required">  Staff Name </label>
                  <select class="form-control select2" style="width: 100%;" id="staff_id" name="staff_id" required>
                    <option selected="selected" value="" selected> Select </option>
                            <?php
                              if(count($staffs) > 0) {
                                foreach ($staffs as $staffData) {
                                    echo '<option value="'.$staffData->staff_id.'">'.$staffData->staff_name.'</option>';
                                }
                            }
                            ?>
                  </select>
                  @error(' ')  
                  <span>{{ $message }}</span>
                  @enderror
                </div>
                
                <div class="form-group">
                  <label for="staff_address" class=" "> Staff Address </label>
                  <textarea class="form-control" rows="3" placeholder="enter address" id="staff_address" name="staff_address" ></textarea>
                 
                  @error(' ')  
                  <span>{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="staff_loan_description">Description </label>
                  <textarea class="form-control" rows="3" placeholder="enter description" id="staff_loan_description" name="staff_loan_description"></textarea>
                  
                  @error(' ')  
                  <span>{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="staff_leader_name" class="required"> Leader Name </label>
                  <input type="text" class="form-control" id="staff_leader_name" placeholder=" enter leader name" name="staff_leader_name" required>
                 
                  @error('Enter Leader Name ')  
                  <span>{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="staff_loan_amount" class="required"> Expense Amount </label>
                  <input type="number" class="form-control" id="staff_loan_amount" placeholder="enter advance or loan amount" name="staff_loan_amount" required>

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
                  <th>Date </th>
                  <th>Staff Name </th>
                  <th>Staff Address </th>
                  <th>Descrition </th>
                  <th>Leader Name </th>
                  <th>Amount </th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    
                  @if(count($staffloan)>0)
                    @foreach($staffloan as $staffloan)
                    <tr>
                      <td>{{ $staffloan->id }}</td>
                      <td>{{ $staffloan->staff_loan_date }}</td>
                      <td>{{ $staffloan->staff->staff_name }}</td>
                      <td>{{ $staffloan->staff_address }}</td>
                      <td>{{ $staffloan->staff_loan_description }}</td>
                      <td>{{ $staffloan->staff_leader_name }}</td>
                      <td>{{ $staffloan->staff_loan_amount }}</td>
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