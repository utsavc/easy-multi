@if (session('role') == 'Dealer')

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

      <li class="nav-item d-sm-inline-block">
        
        <form method="POST" action="{{route('logout')}}">
          @csrf
          <button type="submit" class="btn btn-sm btn-danger p-1" name="logout">Logout</button>
        </form>
      </li>

    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/dealer" class="brand-link text-center">
      Haate Maalo
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
       
        <div class="info">
          <a class="d-block">Hello {{session('name')}}</a>
        </div>
      </div>

      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <span class="text-white ml-3">Date: {{ date('d M Y') }}</span>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
   
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


              <li class="nav-item">
                <a href="{{ route('dealerStock') }}" class="nav-link">
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


              <li class="nav-item">
                <a href="{{ route('dealerchangepassword') }}" class="nav-link">
                  <i class="fa fa-key nav-icon"></i>
                  <p>Change Password</p>
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

@else

<?php
$message = [
  'flashType'    => 'danger',
  'flashMessage' => 'Session expired!'
];

echo redirect()->route('login')->with($message);
?>

@endif