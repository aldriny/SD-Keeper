<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SD Keeper | Become a Partner</title>

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
      <a href="/" class="h1"><b>SD</b>Keeper</a>
    </div>

    <div class="card-body">
        <div class="col-sm-12">
            <form method="POST" action="{{ route('become.partner2') }}">

                @if (session()->get('success'))
                    <div class="alert alert-success">{{session()->get('success')}}</div>
                @endif
                @csrf
                <div class="form-group mb-0">
                    <label for="inputName">Name</label>
                    <input type="text" id="inputName" name="name" class="form-control bg-transparent" value={{old('name')}}>
                </div>
                <span class="text-danger">
                    @error('name'){{$message}}@enderror
                </span>
                <div class="form-group mb-0 mt-3">
                    <label for="inputEmail">E-Mail</label>
                    <input type="email" id="inputEmail" name="email" class="form-control bg-transparent" value={{old('email')}}>
                </div>
                <span class="text-danger">
                    @error('email'){{$message}}@enderror
                </span>
                <div class="form-group mb-0 mt-3">
                    <label for="inputSubject">Phone Number</label>
                    <input type="text" id="inputSubject" name="phone" class="form-control bg-transparent" value={{old('phone')}}>
                </div>
                <span class="text-danger">
                    @error('phone'){{$message}}@enderror
                </span>
                <div class="form-group mb-0 mt-3">
                    <label for="inputMessage" >Message</label>
                    <textarea id="inputMessage" name="msg" class="form-control  bg-transparent" rows="4" value={{old('msg')}}></textarea>
                </div>
                <span class="text-danger">
                    @error('msg'){{$message}}@enderror
                </span>
                <div class="form-group text-center mb-0 mt-3">
                <button type="submit" class="btn text-white" style="background: #fd7e14 !important;" value="Send message">Send Message</button>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
  <!-- /.card -->

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!-- Bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!-- AdminLTE App -->
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>

</body>
</html>


