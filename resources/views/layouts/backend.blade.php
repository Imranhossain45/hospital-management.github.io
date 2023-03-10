<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>
  <link href="{{ asset('backend/css/dist.style.css') }}" rel="stylesheet" />
  <link href="{{ asset('backend/css/styles.css') }}" rel="stylesheet" />
  <script src="{{ asset('backend/css/all.js') }}" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
  <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="index.html">Start Bootstrap</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
        class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
      <div class="input-group">
        <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
          aria-describedby="btnNavbarSearch" />
        <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
      </div>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
          aria-expanded="false"><i class="fas fa-user fa-fw"></i>
          {{ Auth::user()->name }}
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="#!">Settings</a></li>
          <li><a class="dropdown-item" href="#!">Activity Log</a></li>
          <li>
            <hr class="dropdown-divider" />
          </li>
          <li><a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </li>
        </ul>
      </li>
    </ul>
  </nav>
  <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
      <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
          <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link" href="{{ route('home') }}">
              <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
              Dashboard
            </a>
            <div class="sb-sidenav-menu-heading">Interface</div>
            @if(Auth::user()->user_type==1)

            
            {{-- Doctor start --}}
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseDoctor"
              aria-expanded="false" aria-controls="collapseDoctor">
              <div class="sb-nav-link-icon"><i class="fa-solid fa-person"></i></div>
              Doctor
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseDoctor" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="{{ route('backend.doctor.create') }}">Add Doctor</a>
                <a class="nav-link" href="{{ route('backend.doctor.index') }}">All Doctors</a>
              </nav>
            </div>
            {{-- Doctor end --}}
            @endif

            {{-- Blog start --}}
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseBlog"
              aria-expanded="false" aria-controls="collapseBlog">
              <div class="sb-nav-link-icon"><i class="fa-brands fa-blogger-b"></i></i></div>
              Blog
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseBlog" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="{{route('backend.blog.create')}}">Add Blog</a>
                <a class="nav-link" href="{{route('backend.blog.index')}}">All Blogs</a>
              </nav>
            </div>
            {{-- Blog end --}}
            {{-- Appointment start --}}
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseAppointment"
              aria-expanded="false" aria-controls="collapseAppointment">
              <div class="sb-nav-link-icon"><i class="fa-solid fa-calendar-check"></i></i></div>
              Appointment
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseAppointment" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="{{Auth::user()->user_type==1 ? route('appointment.index') : route('appointment.myappointment') }}">All Appointment</a>
              </nav>
            </div>
            {{-- Appointment end --}}
            
            <div class="sb-sidenav-footer">
              <div class="small">Logged in as:</div>
              {{ Auth::user()->name }}
            </div>
      </nav>
    </div>
    <div id="layoutSidenav_content">
      <main>
        <div class="container-fluid px-4">
          <h1 class="mt-4">Dashboard</h1>
          <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
          @include('alert.messsage')
          @yield('content')
        </div>
      </main>
      <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
          <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Your Website 2022</div>
            <div>
              <a href="#">Privacy Policy</a>
              &middot;
              <a href="#">Terms &amp; Conditions</a>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <script src="{{ asset('backend/js/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>
  <script src="{{ asset('backend/js/scripts.js') }}"></script>
  <script src="{{ asset('backend/js/Chart.min.js') }}" crossorigin="anonymous"></script>
  <script src="{{ asset('backend/js/chart-area-demo.js') }}"></script>
  <script src="{{ asset('backend/js/chart-bar-demo.js') }}"></script>
  <script src="{{ asset('backend/js/simple-datatables@latest.js') }}" crossorigin="anonymous"></script>
  <script src="{{ asset('backend/js/datatables-simple-demo.js') }}"></script>
</body>

</html>
