@if (session('role') == 'Retailer')

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
        
        <form method="POST" action="{{route('logout')}}">
          @csrf
          <button type="submit" class="btn btn-sm btn-danger p-1" name="logout">Logout</button>
        </form>
      </li>

    </ul>
  </nav>
  <!-- /.navbar -->



  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary ">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link text-center">
      EMTL V1.0
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{url('retailer/profile')}}" class="d-block">Subash Khatiwada</a>
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
              <i class="nav-icon fa fa-rupee-sign"></i>   
              <p>
                Retailer
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('retailer/transfer') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sale</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('retailer/commission') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Comission</p>
                </a>
              </li>
            </ul>
            

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('retailer/stock') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stock</p>
                </a>
              </li>
            </ul>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('retailer/report') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Report</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fa fa-angle-double-right nav-icon"></i>
              <p>
                Group
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('createGroupForm') }}" class="nav-link">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Create Group</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('addMembers') }}" class="nav-link">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Add Members</p>
                </a>
              </li>
            </ul>
          </li>



          

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-money-bill-alt "></i>   
              <p>
                Transactions
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('deposit') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Deposit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('withdraw') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Withdraw</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('report') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Report</p>
                </a>
              </li>
            </ul>


            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('transfer') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Transfer</p>
                </a>
              </li>
            </ul>



          </li>





          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-map"></i>   
              <p>
                Settings
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('retailer/settings') }}" class="nav-link">
                  <i class="fa fa-angle-double-right nav-icon"></i>
                  <p>Settings</p>
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