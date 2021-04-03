@extends('layouts.app')

@section('content')

<div class="login-box">
    <div class="text-center">
        <span class="h3"> <strong>Haate Maalo</strong></span>
    </div><br>
    <!-- /.login-logo -->








</div>
<!-- /.login-box -->

<div>
    <h3>Please add an Admin by  <a href="{{route('add-admin')}}">Clicking Here</a>...........</h3>
</div>
<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{asset('js/adminlte.min.js')}}"></script>

<!-- pace-progress -->
<script src="{{asset('plugins/pace-progress/pace.min.js')}}"></script>



@endsection
