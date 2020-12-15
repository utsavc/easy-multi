@extends('layouts.app')

@section('content')

<div class="login-box">
    <div class="text-center">
        <span class="h3"> <strong>Haate Maalo</strong></span>
    </div><br>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>           

            <form action="/login" method="post"> 

                {{csrf_field()}}

                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Username" name="username">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                <br>



                @include('messages.messages')
            </form> 
        </div>
        <!-- /.login-card-body -->
    </div>






</div>
<!-- /.login-box -->

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
