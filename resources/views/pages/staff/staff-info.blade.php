@extends('layouts.admin_master')
@section("page-title", "MEX")
@section('page-css')


@endsection


@section('content')

    <section class="content-header">
      <h1>
        Staff 
        <!-- <small>Preview</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route ('pages.home') }}"><i class="fa fa-dashboard"></i> Home </a></li>
        <li><a href="#"> Staff </a></li>
        <li class="active"> Staff Info </li>
      </ol>
    </section>

    <!-- Page Header content -->
    <section class="content" style="min-height: auto; margin-top: 20px;">
      <div class="row">
        <div class="col-xs-12">
          <header class="bg-info" style="border-radius: 3px;">
            <a href="" typy="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus"></i> New Staff</a>
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
            <h4 class="modal-title"> Staff Information Form </h4>
          </div>
          <div class="modal-body">

            <form role="form" action="{{ route('staff.store') }}" method="post">
              @csrf

              <div class="box-body">
                <div class="form-group">
                  <label for="staff_id" class="required"> Staff ID  </label>
                  <input type="text" class="form-control" id="staff_id" placeholder="enter staff id" name="staff_id" required>
                  @error('id')  
                  <span>{{ $message }}</span>
                  @enderror
                </div>
                
                <div class="form-group">
                  <label for="staff_name" class="required"> Staff Name </label>
                  <input type="text" class="form-control" id="staff_name" placeholder="enter staff name" name="staff_name" required>
                  @error('name')  
                  <span>{{ $message }}</span>
                  @enderror
                </div>
                
                <div class="form-group">
                  <label for="staff_mobile_no" class="required"> Staff Mobile No </label>
                  <input type="text" class="form-control" id="staff_mobile_no" placeholder="enter staff mobile no" name="staff_mobile_no" required>
                  @error('mobile_no')  
                  <span>{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="staff_address"> Staff Address </label>
                  <textarea class="form-control" rows="3" id="staff_address" placeholder="enter address" name="staff_address"></textarea>
                  @error('address')  
                  <span>{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="staff_nid_no"> NID No </label>
                  <input type="number" class="form-control" id="staff_nid_no" name="staff_nid_no" placeholder="enter NID No">
                  @error('nid_no')  
                  <span>{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="staff_email_address"> Email address </label>
                  <input type="email" class="form-control" id="staff_email_address" name="staff_email_address" placeholder="enter email address">
                  @error('email')  
                  <span>{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="staff_salary_amount" class="required"> Salary Amount </label>
                  <input type="text" class="form-control" id="staff_salary_amount" name="staff_salary_amount" placeholder="enter salary amount" required>
                  @error('salary')  
                  <span>{{ $message }}</span>
                  @enderror
                </div>
                <!-- <div class="form-group">
                  <label for="exampleInputFile"> Staff Picture </label>
                  <input type="file" id="exampleInputFile" name="staff_picture">
                  @error('picture')  
                  <span>{{ $message }}</span>
                  @enderror
                </div> -->
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
                  <th>Staff ID</th>
                  <!-- <th>Staff Picture </th> -->
                  <th>Staff Name </th>
                  <th>Staff Mobile No </th>
                  <th>Address </th>
                  <th>NID No </th>
                  <th>Email ID </th>
                  <th>Staff Salary </th>
                  <th>Action  </th>
                </tr>
                </thead>
                <tbody>
                  
                @if(count($staffs)>0)
                  @foreach($staffs as $staff)

                  <tr>
                    <td>{{ $staff->id }}</td>
                    <td>{{ $staff->staff_id }}</td>
                    <td>{{ $staff->staff_name }}</td>
                    <td>{{ $staff->staff_mobile_no }}</td>
                    <td>{{ $staff->staff_address }}</td>
                    <td>{{ $staff->staff_nid_no }}</td>
                    <td>{{ $staff->staff_email_address }}</td>
                    <td>{{ $staff->staff_salary_amount }}</td>

                    <td> <a href="#"><i class="fa fa-edit"></i></a> | <a href="#"><i class="fa fa-trash"></i></a> </td>
                  </tr>
                  @endforeach
                @endif
                </tbody>

                <!-- <tfoot>
                  <tr>
                    <th>Rendering engine</th>
                    <th>Browser</th>
                    <th>Platform(s)</th>
                    <th>Engine version</th>
                    <th>CSS grade</th>
                  </tr>
                </tfoot> -->

              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </div>
    </section>

    @endsection

    @section('page-js')
    <script>
      // $('#modal-default').modal({backdrop: 'static', keyboard: false}, 'show');
    </script>
    @endsection