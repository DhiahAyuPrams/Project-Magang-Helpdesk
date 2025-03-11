<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="{{ asset('gambar/Logopupr.png') }}">
    <link href='https://fonts.googleapis.com/css?family=Nunito' rel='stylesheet'>
    <title>Dashboard - Helpdesk Bina Marga</title>
    
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('template/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('template/dist/css/adminlte.min.css') }}">
    <style>
        /* Custom styles for this template */
        .wrapper, .content-wrapper, .main-footer {
            margin-left: 0 !important;
            transition: none !important;
            width: 100% !important;
        }
        table.dataTable thead th, 
        table.dataTable tbody td {
            border: 1px solid black !important; /* Membuat garis lebih tebal */
        }

        table.dataTable {
            border-collapse: collapse !important; /* Mencegah garis ganda */
        }
    </style>
</head>

<body class="hold-transition layout-fixed">
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{ asset('gambar/logo.png') }}" alt="AdminLTELogo" height="100" width="auto">
    </div>
    <!-- Navbar -->
    @if(Auth::user()->role == 'Pegawai')
    <nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: khaki;">
    @elseif (Auth::user()->role == 'Tim IT')
    <nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: #94D3F6;">
    @endif
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

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="margin-left: 0 !important; transition: none !important; width: 100% !important;">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="m-0">My Tickets</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Home</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid p-2">
                <div class="card">
                    @if(Auth::user()->role != 'Tim IT')
                    <div class="card-header">
                        <div class="ml-auto d-flex justify-content-start">
                            <a href="/createticket-user" class="btn btn-primary mr-1 ml-auto">New Ticket</a>
                            {{-- <button type="button" class="btn btn-primary mr-1">Filter</button> --}}
                            {{-- <button type="button" class="btn btn-primary">Reload</button> --}}
                            {{-- <i class="fas fa-solid fa-plus"></i>  --}}
                            
                        </div>                            
                    </div>
                    @endif
                    <div class="card-body">
                        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12 col-md-6"></div>
                                <div class="col-sm-12 col-md-6"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example2"
                                        class="table table-bordered table-hover dataTable dtr-inline"
                                        aria-describedby="example2_info">
                                        <thead>
                                            <tr>
                                                <th class="sorting" tabindex="0" aria-controls="example2"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Rendering engine: activate to sort column ascending">
                                                    No</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Rendering engine: activate to sort column ascending">
                                                    Subject</th>
                                                <th class="sorting sorting_desc" tabindex="0"
                                                    aria-controls="example2" rowspan="1" colspan="1"
                                                    aria-label="Browser: activate to sort column ascending"
                                                    aria-sort="descending">Created at</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending">
                                                    Update at</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Engine version: activate to sort column ascending">
                                                    Status</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Engine version: activate to sort column ascending">
                                                    Agent</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach ($listTicket as $item)
                                            {{-- @if(Auth::user()->role == 'Pegawai')
                                            <tr 
                                                onclick="window.location.href='{{ url('ticket-detail/' . $item->id) }}'"
                                                class="@if(Auth::user()->role == 'Pemimpin') disabled-row @endif"
                                                style="cursor: pointer;">
                                                <td style="text-align: center">{{ $no++ }}</td>
                                                <td class="dtr-control">{{ $item->subjek }}</td>
                                                <td class="sorting_1">{{ $item->created_at->format('d/m/Y H:i') }}</td>
                                                <td>{{ $item->updated_at->format('d/m/Y H:i') }}</td>
                                                <td>{{ $item->status }}</td>
                                                <td>{{ $agents[$item->agent]->name ?? 'Belum Ada Assign Agent' }}</td>
                                            </tr> 
                                            @elseif(Auth::user()->role == 'Tim IT') --}}
                                            <tr 
                                                onclick="window.location.href='{{ url('ticket-detail-timit/' . $item->id) }}'"
                                                class="@if(Auth::user()->role == 'Pemimpin') disabled-row @endif"
                                                style="cursor: pointer;">
                                                <td style="text-align: center">{{ $no++ }}</td>
                                                <td class="dtr-control">{{ $item->subjek }}</td>
                                                <td class="sorting_1">{{ $item->created_at->format('d/m/Y H:i') }}</td>
                                                <td>{{ $item->updated_at->format('d/m/Y H:i') }}</td>
                                                <td>{{ $item->status }}</td>
                                                <td>{{ $agents[$item->agent]->name ?? 'Belum Ada Assign Agent' }}</td>
                                            </tr>
                                            {{-- @endif --}}
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer" style="margin-left: 0 !important; transition: none !important; width: 100% !important;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 text-center text-md-left">
                    <strong>Copyright &copy; 2024 <a href="https://binamarga.pu.go.id/aplikasi/">Dirjen Bina Marga</a>.
                    </strong> All Rights Reserved.
                </div>
                <div class="col-md-6 text-center text-md-right">
                    <b>Version</b> 0.1.0
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="{{ asset('template/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('template/dist/js/adminlte.js') }}"></script>
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
