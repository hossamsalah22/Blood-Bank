<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Blood Bank</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('dist/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      {{-- User Actions --}}
      <li class="dropdown menu">
        <!-- Menu Footer-->
        <li class="user-footer">
          {{-- logout --}}
          <div class="pull-right">
            <a href="#" class="btn btn-default btn-flat" 
              onclick="event.preventDefault();document.getElementById('logout-form').submit();">Sign out</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
              </form>
          </div>
        </li>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
  

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/home" class="brand-link">
      <img src="../../dist/img/blood-bank.png"
           alt="BloodBank Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">BloodBank</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="height: auto";>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../../index.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v2</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{route('client.index')}}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>Clients</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('donation-request.index')}}" class="nav-link">
              <i class="nav-icon fas fa-plus-square"></i>
              <p>Donation Requests</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('blood-type.index')}}" class="nav-link">
              <i class="nav-icon fas fa-heart"></i>
              <p>Blood Types</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('governorate.index')}}" class="nav-link">
              <i class="nav-icon fas fa-city"></i>
              <p>Governorate</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('city.index')}}" class="nav-link">
              <i class="nav-icon fas fa-city"></i>
              <p>City</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('category.index')}}" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>Category</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('post.index')}}" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>Post</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('contact.index')}}" class="nav-link">
              <i class="nav-icon fas fa-envelope"></i>
              <p>Contacts</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url(route('change-password.index'))}}" class="nav-link">
            <i class="nav-icon fas fa-file"></i>
            <p>Change Password</p>
          </a>
        </li>
          <li class="nav-item">
            <a href="{{route('setting.index')}}" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>Settings</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Blood Bank</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol> 
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h1 class="card-title">@yield('page_title')</h1>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      

    @yield('content')
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.5
    </div>
    <strong>Copyright &copy; 2021 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src=" {{asset('dist/plugins/jquery/jquery.min.js')}} "></script>
<!-- Bootstrap 4 -->
<script src=" {{asset('dist/plugins/bootstrap/js/bootstrap.bundle.min.js')}} "></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
</body>
</html>
