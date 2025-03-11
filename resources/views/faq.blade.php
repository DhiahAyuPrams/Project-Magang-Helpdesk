<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="{{ asset('gambar/Logopupr.png') }}">
    <link href='https://fonts.googleapis.com/css?family=Nunito' rel='stylesheet'>
    <title>Dasboard - Helpdesk Bina Marga</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('template/plugins/fontawesome-free/css/all.min.css') }} ">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('template/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('template/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('template/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('template/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('template/plugins/summernote/summernote-bs4.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- Tambahkan Font Awesome jika belum ada -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<style>
    .user-panel {
        margin-top: 10px;
        /* mt menjadi 2.5 */
        margin-bottom: 10px;
        /* mb menjadi 2.5 */
        padding-bottom: 10px;
        /* pb menjadi 2.5 */
    }

    .brand-link {
        display: inline-block;
        /* Memastikan <a> hanya mengambil ruang yang dibutuhkan */
    }

    .brand-image {
        opacity: 0.8;
        /* Mengatur opasitas */
        width: 100%;
        /* Mengatur lebar menjadi 100% dari kontainer */
        height: auto;
        /* Menjaga rasio aspek gambar */
        max-width: 95%;
        /* Batas maksimum lebar gambar */
    }

    .img-50 {
        width: 45px;
        height: 45px;
        object-fit: cover; /* Ensure the image maintains aspect ratio */
        border-radius: 50%; /* Ensure the border is rounded */
        border: 2px solid #000;
    }
</style>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('gambar/logo.png') }}" alt="AdminLTELogo" height="100"
                width="auto">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color: khaki;">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item dropdown">
        <img src="{{asset('template/dist/img/AdminLTELogo.png')}}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8; width: 35px; height: 35px;">
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <div class="d-flex flex-column align-items-center m-2">
    <!-- Gambar User -->
    <img src="{{ asset('gambar/user.png') }}" class="img-circle" style="width: 70px; height: 70px; margin-bottom: 10px;" alt="User Image">
    
    <!-- Nama User -->
    <strong style="font-size: 18px; margin-bottom: 5px;">{{ Auth::user()->name }}</strong>
    
    <!-- Role User -->
    <span style="font-size: 16px; color: gray;">{{ Auth::user()->role }}</span>
</div>
                        <a class="dropdown-item" href="/logout">
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-primary elevation-4" style="background-color: #94D3F6;">
            <!-- Brand Logo -->
            <a href="/dashboard-admin" class="brand-link w-100"
                style="display: flex; align-items: center; justify-content: center; gap: 0;">
                <img src="{{ asset('gambar/logopupr.png') }}" alt="AdminLTE Logo" class="brand-image elevation-3"
                    style="opacity: .8; width: auto; height: 35px; margin: 0; padding: 0;">
                <span class="brand-text font-weight-light" style="margin-left: 10px; padding: 0;">
                    <img src="{{ asset('gambar/texthelpdesk.png') }}" class="brand-image"
                        style="opacity: .8; width: auto; height: 35px; margin: 0; padding: 0;">
                </span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                        <!-- Dashboard -->
                        <li class="nav-item">
                            <a href="/dashboard-admin" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <!-- Tickets -->
                        <li class="nav-item">
                            </a>
                                <li class="nav-item">
                                    <a href="/ticket-list" class="nav-link">
                                        <i class="nav-icon fas fa-solid fa-ticket"></i>
                                        <p>Ticket Lists</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link active">
                                        <i class="nav-icon fas fa-solid fa-circle-question"></i>
                                        <p>
                                            Frequently Asked Questions
                                        </p>
                                    </a>
                                </li>
                        </li>
                        <!-- Users Account Setting -->
                        <li class="nav-item">
                            <a href="/user-list" class="nav-link">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <p>
                                    Users Account Setting
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/user-list" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>User Account Lists</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/create-user" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Create User Account</p>
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
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <h1 class="m-0">Frequently Asked Questions</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <!-- Inside content section -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Success message -->
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                
                    <!-- Create FAQ Form -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Create FAQ</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('faq.store') }}">
                                @csrf <!-- CSRF token for security -->
                                
                                <!-- Question Input -->
                                <div class="form-group">
                                    <label for="question">Question</label>
                                    <input type="text" name="question" id="question" class="form-control" value="{{ old('question') }}" required>
                                    @error('question')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                
                                <!-- Answer Input -->
                                <div class="form-group">
                                    <label for="answer">Answer</label>
                                    <textarea name="answer" id="answer" class="form-control" rows="5" required>{{ old('answer') }}</textarea>
                                    @error('answer')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                
                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary">Save FAQ</button>
                            </form>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="row justify-content-center mt-5">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header text-center">
                                        <h1><strong>F A Q </strong></h1>
                                        <h6>Frequently Asked Questions</h6>
                                    </div>
                                    <div class="card-body" id="accordion">
                                        @foreach($faqs as $index => $faq)
                                            <div class="card card-primary card-outline">
                                                <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapse{{ $index }}" aria-expanded="false">
                                                    <div class="card-header d-flex justify-content-between align-items-center">
                                                        <h4 class="card-title m-0">
                                                            {{ $loop->iteration }}. {{ $faq->question }}
                                                        </h4>
                                                        <div class="ml-auto"> <!-- Tambahkan ml-auto agar tombol ke kanan -->
                                                            <!-- Tombol Delete -->
                                                            <button class="btn btn-danger btn-sm deleteFaqBtn" 
                                                                data-id="{{ $faq->id }}" 
                                                                data-toggle="modal" data-target="#deleteFaqModal">
                                                                Delete
                                                            </button>
                                                        </div>
                                                    </div>
                                                    
                                                </a>
                                                <div id="collapse{{ $index }}" class="collapse" data-parent="#accordion">
                                                    <div class="card-body">
                                                        {{ $faq->answer }}
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Modal Konfirmasi Delete FAQ -->
                    <div class="modal fade" id="deleteFaqModal" tabindex="-1" aria-labelledby="deleteFaqModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteFaqModalLabel">Konfirmasi Hapus FAQ</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form id="deleteFaqForm" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="modal-body">
                                        <p>Apakah Anda yakin ingin menghapus FAQ ini?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>                    
                </div>
            </section>
                      
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2024 <a href="https://binamarga.pu.go.id/aplikasi/">Dirjen Bina Marga</a></strong>
            All Rights Reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 0.1.0
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('template/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('template/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('template/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('template/plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('template/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('template/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('template/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('template/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('template/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('template/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('template/dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('template/dist/js/pages/dashboard.js') }}"></script>
    <script>
        $(document).ready(function() {
        // Saat tombol Delete diklik, atur action form delete
        $(".deleteFaqBtn").click(function() {
            let id = $(this).data("id");
            $("#deleteFaqForm").attr("action", "/faq/" + id);
        });
    });

    </script>
</body>

</html>
