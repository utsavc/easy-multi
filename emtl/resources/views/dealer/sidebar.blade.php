<<<<<<< Updated upstream
=======
@if (session('role') == 'Dealer')

>>>>>>> Stashed changes
@extends('layouts.app')

@section('sidebar')
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <li class="nav-item d-none d-sm-inline-block">
<<<<<<< Updated upstream
        <form>
          <button class="btn btn-sm btn-danger p-1">Logout</button>
=======
        <form method="GET" action="<?php if(isset($_GET['logout'])) { session()->forget('role'); echo redirect()->route('login'); }?>">
          <button type="submit" class="btn btn-sm btn-danger p-1" name="logout">Logout</button>
>>>>>>> Stashed changes
        </form>
      </li>

    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/dealer" class="brand-link text-center">
      EMTL <span class="hide-version">V1.0</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{url('profile')}}" class="d-block">Subash Khatiwada</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->

           

          <!--<li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Widgets
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>-->



          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-plus"></i>
              <p>
                Dealer
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">

               <li class="nav-item">
                <a href="{{ url('dealer/transfer') }}" class="nav-link">
                  <i class="fa fa-angle-double-right nav-icon"></i>
                  <p>Transfer to Retailer</p>
                </a>
              </li>




              <a href="{{ url('dealer/') }}" class="nav-link">
                <i class="fa fa-angle-double-right nav-icon"></i>
                <p>Report</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ url('dealer/commission') }}" class="nav-link">
                <i class="fa fa-angle-double-right nav-icon"></i>
                <p>Commission</p>
              </a>
            </li>


            <li class="nav-item">
              <a href="{{ url('dealer/stock') }}" class="nav-link">
                <i class="fa fa-angle-double-right nav-icon"></i>
                <p>Stock</p>
              </a>
            </li>
          </ul>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">


  @yield('bodycontent')

</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

</div>
<!-- ./wrapper -->


@endsection