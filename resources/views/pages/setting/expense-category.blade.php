@extends('layouts.admin_master')
@section("page-title", "MEX")
@section('page-css')


@endsection


@section('content')

    <section class="content-header">
      <h1>
        Setting 
        <!-- <small>Preview</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route ('pages.home') }}"><i class="fa fa-dashboard"></i> Home </a></li>
        <li><a href="#"> Setting </a></li>
        <li class="active"> Expense Category  </li>
      </ol>
    </section>

    <!-- Page Header content -->
    <section class="content" style="min-height: auto; margin-top: 20px;">
      <div class="row">
        <div class="col-xs-12">
          <header class="bg-info" style="border-radius: 3px;">
            <a href="" typy="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus"></i> New Category</a>
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
            <h4 class="modal-title"> Expense Category Form </h4>
          </div>
          <div class="modal-body">

            <form role="form" action="{{ route('expenseCat.store') }}" method="post">
              @csrf

              <div class="box-body">
                <div class="form-group">
                  <label for="expense_category_name" class="required"> Expense Category Name </label>
                  <input type="text" class="form-control" id="expense_category_name" placeholder="enter expense category name" name="expense_category_name" required>
                  @error('name')  
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
                  <th>Expense Category Name</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @if(count($expenseCats)>0)
                  @foreach($expenseCats as $expenseCat)
                  <tr>

                    <td>{{ $expenseCat->expense_category_id }} </td>
                    <td>{{ $expenseCat->expense_category_name }}</td>
                    <td> <a href="#"><i class="fa fa-trash"></i></a> </td>

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
    // $('#modal-default').modal({
    // backdrop: 'static',
    // keyboard: false
    // })
    // $('#modal-default').modal({backdrop: 'static', keyboard: false}, 'show');
  </script>
  @endsection