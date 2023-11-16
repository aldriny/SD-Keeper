


<html lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>please allow location</title>
    
      <!-- Theme style -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">
      <!-- My CSS style -->
      <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>
    <body class="hold-transition sidebar-mini  text-white" id="user-layout-body">
    
    <form action="{{route('get.location')}}" method="post">
        @csrf

        <input type="hidden" name="userLong">
        <input type="hidden" name="userLat">
        <input type="hidden" name="userAcc">
        <div class="text-center login-page text-gray">
            <p class="lead text-bold">please allow location</p>
            <button type="submit"  class="btn text-white" style="background: #fd7e14 !important;">Continue</button>
        </div>
    </form>




<!-- jQuery -->
<script type="text/javascript" src="{{asset('js/js.js')}}"></script>

<script>
  $(function(){
    $(".datepicker").datepicker();
  });
</script>

@yield('script')
</body>
</html>