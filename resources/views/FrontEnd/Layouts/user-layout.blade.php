<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>
  <base href="{{ \URL::to('/') }}">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">
  <link href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css">
  <!-- My CSS style -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="hold-transition sidebar-mini  text-white" id="user-layout-body">
<div style="overflow-x: hidden; position:relative;">
    <nav class="navbar navbar-expand-lg bg-transparent" id="user-nav">
        <a class="navbar-brand text-white" href="{{route('user.dashboard')}}"><span class="text-orange">SD</span> Keeper</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      @auth
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link text-white" href="{{ route('user.profile') }}">Profile
            </a>
        </li>
        <li class="nav-item active">
          <a href={{route('profile.settings')}} class="nav-link text-white" id="profile-settings">Settings
          </a>
      </li>
          <li class="nav-item active">
              <a class="nav-link text-white" id="user_logout" href="{{ route('user.logout') }}">Logout
                  <i class="fas fa-sign-out-alt text-white"></i>
              </a>
          </li>
        </ul>
      </div>     
      @endauth
      @guest
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
              <a class="nav-link text-white" href="{{ route('user.login1') }}">Login
                  <i class="fas fa-sign-in-alt text-white"></i>
              </a>
          </li>
        </ul>
      </div> 
      @endguest

      </nav>
<!-- REQUIRED SCRIPTS -->

@yield('content')


<footer>
    <div class="text-center">
        <p class="lead">©<span class="text-orange">SD</span>Keeper 2022</p>
    </div>
</footer>




<!-- jQuery -->
<script src="https://code.jquery.com/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<!-- Bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!-- AdminLTE App -->
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>

<script>
  $(function(){
    $(".datepicker").datepicker();
  });
</script>

@yield('script')
</div>
</body>
</html>
