<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SD Keeper | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-orange">
    <div class="card-header text-center">
      <a href="/" class="h1"><b class="text-orange">SD</b>Keeper</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Please allow your Location</p>

      @if (session()->get('success'))
        <div class="alert alert-success">{{session()->get('success')}}</div>
      @endif

      @if (session()->get('fail'))
        <div class="alert alert-danger">{{session()->get('fail')}}</div>
      @endif

      <form action="{{route('user.login2')}}" method="post">
        @csrf
        <div class="input-group">
          <input type="hidden" name="userLong">
          <input type="hidden" name="userLat">
          <input type="hidden" name="userAcc">
          <input type="email" class="form-control" placeholder="Email" name="email" value={{old('email')}}>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div>
          <span class="text-danger">
            @error('email'){{$message}}@enderror
          </span>
        </div>
        <div class="input-group mt-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div>
          <span class="text-danger">
            @error('password'){{$message}}@enderror
          </span>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12 mt-3">
            <button type="submit" class="btn btn-block text-white" style="background: #fd7e14 !important;">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="mb-0 mt-3">
        <a href="{{route('user.register1')}}"class="text-center text-orange">Register for a new membership!</a>
      </p>
      <hr class="mb-2">
      <p class="mb-0">
        <a href="{{route('user.become.partner')}}" class="text-orange">Become a Partner!</a>
      </p>
      <p class="mb-0">
        <a href="{{route('customer.login1')}}"class="text-center text-orange">Login as a partner instead.</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!-- Bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!-- AdminLTE App -->
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
<script type="text/javascript" src="{{asset('js/js.js')}}"></script>

</body>
</html>
