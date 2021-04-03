<!DOCTYPE html>
<html lang="en">
<head>
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Haate Maalo- Home</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- ============================================ -->
  <link rel="stylesheet" href="{{ asset('css/data-table/bootstrap-table.css') }}">
  <link rel="stylesheet" href="{{ asset('css/data-table/bootstrap-editable.css') }}">
  <!-- style CSS-->


  <!-- jQuery -->
  <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>


  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>




</head>


<body class="hold-transition {{ Route::currentRouteNamed('add-admin') ? 'login-page' : Route::currentRouteNamed('login') ? 'login-page' : 'sidebar-mini layout-fixed' }} ">

  @yield('sidebar')

  @yield('content')


  


</body>
<!-- pace-progress -->
<script src="{{asset('plugins/pace-progress/pace.min.js')}}"></script>




<!-- REQUIRED SCRIPTS -->
<!-- Bootstrap -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('js/adminlte.js') }}"></script>




 <!-- data table JS
  ============================================ -->
  <script src="{{ asset('js/data-table/bootstrap-table.js') }}"></script>
  <script src="{{ asset('js/data-table/tableExport.js') }}"></script>
  <script src="{{ asset('js/data-table/data-table-active.js') }}"></script>
  <script src="{{ asset('js/data-table/bootstrap-table-resizable.js') }}"></script>
  <script src="{{ asset('js/data-table/colResizable-1.5.source.js') }}"></script>
  <script src="{{ asset('js/data-table/bootstrap-table-export.js') }}"></script>


  <!-- PAGE SCRIPTS -->
  <script src="{{ asset('js/pages/dashboard.js') }}"></script>

  <script type="text/javascript">
    $('div.alert').delay(3000).slideUp(300);
  </script>
</script>



</body>
</html>
