<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('assets/bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/css/AdminLTE.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/iCheck/square/blue.css') }}">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../index.html"><b>Wafgroup</b> </a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Log in to start your session</p>

    <form method="POST" action="{{ route('login') }}" name="login-form">
      @csrf
      <div for="email" class="form-group has-feedback">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email" name="email" value="{{ old('email') }}" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

        @error('email')
					<span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
				@enderror

      </div>
      <div for="password" class="form-group has-feedback">
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter Password" name="password" autocomplete="current-password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>

        @error('password')
					<span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
				@enderror

      </div>
      <div class="row">
        <div class="loginPage">
          <div class="col-xs-8">
            <div class="checkbox icheck">
              <label for="remember_me">
                <input id="remember_me" type="checkbox" name="remember"> Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat" name="submit">Log In</button>
          </div>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <br/>
    <a href="#" >I forgot my password</a><br>
    <!-- <a href="#" data-toggle="modal" data-target="#modal-default">I forgot my password</a><br> -->
   
    <div class="modal fade" id="modal-default">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"> Enter Your Email ID & Recover Your Password </h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="emailAddress" class="required"> Email address </label>
              <input type="email" class="form-control" id="emailAddress" placeholder="enter email address" name="recoverPWEmail" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary"> Send Email </button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- <a href="register.html" class="text-center">Register a new membership</a> -->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="{{ asset('assets/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- iCheck -->
<script src="{{ asset('assets/plugins/iCheck/icheck.min.js') }}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
