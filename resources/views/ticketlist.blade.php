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
    <link rel="stylesheet" href="{{ asset('template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
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
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                             with font-awesome or any other icon font library -->
                        
                             @if(Auth::user()->role == 'Super Admin')
                             <li class="nav-item">
                                 <a href="/dashboard-admin" class="nav-link">
                                     <i class="nav-icon fas fa-tachometer-alt"></i>
                                     <p>Dashboard</p>
                                 </a>
                             </li>
                             @elseif(Auth::user()->role == 'Tim IT')
                             <li class="nav-item">
                                 <a href="#" class="nav-link">
                                     <i class="nav-icon fas fa-tachometer-alt"></i>
                                     <p>Dashboard</p>
                                 </a>
                             </li>
                             @elseif(Auth::user()->role == 'Pimpinan')
                             <li class="nav-item">
                                 <a href="/dashboard-supervisor" class="nav-link">
                                     <i class="nav-icon fas fa-tachometer-alt"></i>
                                     <p>Dashboard</p>
                                 </a>
                             </li>
                             @endif
                             <li class="nav-item">
                               <a href="/ticket-list" class="nav-link active">
                                <i class="nav-icon fas fa-solid fa-ticket"></i>
                                 <p>Ticket Lists</p>
                               </a>
                             </li>
                             @if(Auth::user()->role != 'Pimpinan')
                                <li class="nav-item">
                                <a href="/FAQ" class="nav-link">
                                    <i class="nav-icon fas fa-solid fa-circle-question"></i>
                                    <p>Frequently Asked Questions</p>
                                </a>
                                </li>
                            @endif
                           <!-- Users Account Setting -->
                           @if(Auth::user()->role != 'Pimpinan' && Auth::user()->role != 'Tim IT')
                           <li class="nav-item">
                             <a href="#" class="nav-link">
                               <i class="nav-icon fas fa-chart-pie"></i>
                               <p>
                                 Users Account Setting
                                 <i class="right fas fa-angle-left"></i>
                               </p>
                             </a>
                             <ul class="nav nav-treeview">
                               <li class="nav-item">
                                 <a href="/user-list" class="nav-link">
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
                           @endif
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
                            <h1 class="m-0">Tickets</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                @if(Auth::user()->role == 'Pimpinan')
                                <li class="breadcrumb-item"><a href="/dashboard-supervisor">Home</a></li>
                             @else
                                <li class="breadcrumb-item"><a href="/dashboard-admin">Home</a></li>
                                @endif
                                <li class="breadcrumb-item active">Tickets List</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            {{-- @if(Auth::user()->role != 'Pimpinan')
                            <div class="col-2 ml-auto d-flex justify-content-start">
                                <a href="/create-ticket" class="btn btn-primary mr-1">Create</a>
                                {{-- <button type="button" class="btn btn-primary mr-1">Filter</button> --}}
                                {{-- <button type="button" class="btn btn-primary">Reload</button> --}}
                                {{-- <i class="fas fa-solid fa-plus"></i>  --}}
                            {{-- </div>  
                            @endif                           --}}
                            <div class="ml-auto d-flex justify-content-start">
                                @if(Auth::user()->role != 'Super Admin')
                                <a href="/createticket-user" class="btn btn-primary mr-1 ml-auto">New Ticket</a>
                                {{-- <button type="button" class="btn btn-primary mr-1">Filter</button> --}}
                                {{-- <button type="button" class="btn btn-primary">Reload</button> --}}
                                {{-- <i class="fas fa-solid fa-plus"></i>  --}}
                                @endif
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6"></div>
                                    <div class="col-sm-12 col-md-6"></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                                            <thead>
                                                <tr>
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">No</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">Nama Pelapor</th>
                                                    <th class="sorting sorting_desc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" aria-sort="descending">Aplikasi</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Subject</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Prioritas</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Agent</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Status</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Tanggal masuk</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                $no = 1;
                                                @endphp
                                                @foreach ($listTicket as $item)
                                                <tr 
                                                @if(Auth::user()->role === 'Pimpinan')
                                                 onclick="window.location.href='{{ url('ticket-detail-timit/' . $item->id) }}'"
                                                @else
                                                    onclick="window.location.href='{{ url('ticket-detail/' . $item->id) }}'"
                                                @endif
                                                    style="cursor: pointer;">
                                                    <td style="text-align: center">{{ $no++ }}</td>
                                                    <td class="dtr-control">{{ $item->nama }}</td>
                                                    <td class="sorting_1">{{ $item->aplikasi }}</td>
                                                    <td>{{ $item->subjek }}</td>
                                                    <td>{{ $item->prioritas }}</td>
                                                    <td>{{ $agents[$item->agent]->name ?? 'Belum Ada Assign Agent' }}</td>
                                                    <td>{{ $item->status }}</td>
                                                    <td>{{ $item->created_at->format('d/m/Y H:i') }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- Pagination and other elements -->
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div><!-- /.container-fluid -->
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
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('template/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('template/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('template/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('template/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <!-- Page specific script -->
    <script>
        $(function () {
        $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
        });
    </script>
</body>

</html>
