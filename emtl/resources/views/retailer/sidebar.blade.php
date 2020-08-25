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
        <form>
          <button class="btn btn-sm btn-danger p-1">Logout</button>
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
          <a href="{{url('profile')}}" class="d-block">Utsav Chaudhary</a>
        </div>
      </div>

      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <span class="text-white ml-3">Date: August 20,2020</span>
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
                <a href="{{ url('admin/retailer/transfer') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Transfer</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/retailer/comission') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Comission</p>
                </a>
              </li>
            </ul>



            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/retailer/stock') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stock</p>
                </a>
              </li>
            </ul>


            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/retailer/product-report/1') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Report</p>
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
                <a href="{{ url('admin/exams') }}" class="nav-link">
                  <i class="fa fa-angle-double-right nav-icon"></i>
                  <p>Exam List</p>
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
