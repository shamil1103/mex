@extends('layouts.admin_master')
@section("page-title", "MEX")
@section('page-css')


@endsection


@section('content')

    <section class="content-header">
      <h1>
        Deposit Report
        <!-- <small>Preview</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route ('pages.home') }}"><i class="fa fa-dashboard"></i> Home </a></li>
        <li><a href="#"> Report </a></li>
        <li class="active"> Deposit Report </li>
      </ol>
    </section>

    <!-- Page Header content -->
    <section class="content" style="min-height: auto; margin-top: 20px;">
      <div class="row">
        <div class="col-xs-12">
          <header class="bg-info" style="border-radius: 3px;">
            <form action="" style="padding: 10px; display: flex; align-items: center; justify-content: space-around">
              <div class="form-group" style="margin-bottom: 0px;">
                <select class="form-control " style="width: 100%;" name=" " required>
                  <option selected="" value="" > --- Deposit Type --- </option>
                  <option value="cash"> Cash </option>
                  <option value="bank"> Bank </option>
                  <option value="nagad"> Nagad/bkash </option>
                </select>
              </div>
              <div class="form-group" style="margin-bottom: 0px;"> 
                <input type="date" class="form-control" id=" " placeholder=" " name=" " >
              </div>
              <div class="form-group" style="margin-bottom: 0px;">
                <input type="date" class="form-control" id=" " placeholder=" " name=" " >
              </div>
              <div class="form-group" style="margin-bottom: 0px;">
                <input type="button" class="btn btn-primary" value="Search" >
              </div>
            </form>
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
                  <th>Deposit Type </th>
                  <th>Date </th>
                  <th>Depositor ID </th>
                  <th>Depositor Name </th>
                  <th>Deposit Mobile No </th>
                  <th>Bank Name </th>
                  <th>TXID No </th>
                  <th>Address </th>
                  <th>NID No </th>
                  <th>Deposit Amount </th>
                </tr>
                </thead>
                <tbody>
                  
                @if(count($ )>0)
                  @foreach($  as $ )

                    <tr>
                      <td>{{ $ ->id }}</td>
                      <td>{{ $ -> }}</td>
                      <td>{{ $ -> }}</td>
                      <td>{{ $ -> }}</td>
                      <td>{{ $ -> }}</td>
                      <td>{{ $ -> }}</td>
                      <td>{{ $ -> }}</td>
                      <td>{{ $ -> }}</td>
                      <td>{{ $ -> }}</td>
                      <td>{{ $ -> }}</td>
                      <td>{{ $ -> }}</td>
                      <td>{{ $ -> }}</td>
                    </tr>

                  @endforeach
                @endif
                </tbody>

                <!-- <tfoot>
                  <tr>
                    <th> </th>
                    <th> </th>
                    <th> </th>
                    <th> </th>
                    <th> </th>
                    <th> </th>
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