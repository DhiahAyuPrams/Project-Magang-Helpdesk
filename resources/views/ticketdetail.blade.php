<!DOCTYPE html>
<html lang="en">

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
        object-fit: cover;
        /* Ensure the image maintains aspect ratio */
        border-radius: 50%;
        /* Ensure the border is rounded */
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
                    <img src="{{ asset('template/dist/img/AdminLTELogo.png') }}" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" alt="AdminLTE Logo"
                        class="brand-image img-circle elevation-3" style="opacity: .8; width: 35px; height: 35px;">
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <div class="d-flex flex-column align-items-center m-2">
                            <!-- Gambar User -->
                            <img src="{{ asset('gambar/user.png') }}" class="img-circle"
                                style="width: 70px; height: 70px; margin-bottom: 10px;" alt="User Image">

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
                            <a href="/ticket-list" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ticket Lists</p>
                            </a>
                        </li>
                        <a href="/FAQ" class="nav-link">
                            <i class="nav-icon fas fa-ticket"></i>
                            <p>
                                Frequently Asked Questions
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        </li>
                        <!-- Users Account Setting -->
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
                                <li class="breadcrumb-item"><a href="/dashboard-admin">Home</a></li>
                                <li class="breadcrumb-item"><a href="/ticket-list">Ticket List</a></li>
                                <li class="breadcrumb-item active">Tickets Detail</li>
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
                            <div class="row">
                                @if ($ticket->status !== 'closed')
                                    <button type="button" class="btn btn-warning float-right mb-2 ml-auto"
                                        data-toggle="modal" data-target="#myModal" data-id="{{ $ticket->id }}">
                                        Edit
                                    </button>
                                @endif
                                <div class="col-12">
                                    <section class="content">
                                        <div class="card">
                                            <div class="card-header d-flex">
                                                <h3 class="card-title">{{ $ticket->subjek }}</h3>
                                                <div class="ml-auto">
                                                    @if ($ticket->status === 'pending')
                                                        <span
                                                            class="badge bg-warning text-dark">{{ $ticket->status }}</span>
                                                    @elseif ($ticket->status === 'closed')
                                                        <span class="badge bg-danger">{{ $ticket->status }}</span>
                                                    @else
                                                        <span class="badge bg-success">{{ $ticket->status }}</span>
                                                    @endif
                                                    <br>
                                                    @if ($ticket->prioritas === 'Urgent')
                                                        <span class="badge bg-danger">{{ $ticket->prioritas }}</span>
                                                    @elseif ($ticket->prioritas === 'High')
                                                        <span
                                                            class="badge bg-warning text-dark">{{ $ticket->prioritas }}</span>
                                                    @elseif ($ticket->prioritas === 'Medium')
                                                        <span class="badge bg-info">{{ $ticket->prioritas }}</span>
                                                    @elseif ($ticket->prioritas === 'Low')
                                                        <span class="badge bg-success">{{ $ticket->prioritas }}</span>
                                                    @else
                                                        <span
                                                            class="badge bg-secondary">{{ $ticket->prioritas }}</span>
                                                    @endif

                                                </div>
                                            </div>
                                            <div class="card-body">
                                                {{ $ticket->deskripsi }}
                                            </div>
                                            <div class="card-body">
                                                @if ($ticket->attachments->isEmpty())
                                                    <p class="text-muted">Tidak ada attachment untuk tiket ini.</p>
                                                @else
                                                    <div class="row">
                                                        @foreach ($ticket->attachments as $attachment)
                                                            <div class="col-md-3"
                                                                style="max-width: 175px; height: auto; overflow: hidden;">
                                                                <img src="{{ asset('storage/' . $attachment->file_path) }}"
                                                                    alt="Attachment"
                                                                    style="width: 175px; height: 175px; object-fit: contain;">
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="card-footer">
                                                <h6 class="col-2 ml-auto">
                                                    {{ $ticket->created_at }}
                                                </h6>
                                            </div>

                                        </div>
                                        @if ($ticket->feedback !== null && ($ticket->status === 'closed' || $ticket->status === 'closed'))
                                            <div class="col-12">
                                                <div class="card card-outline card-success">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Feedback</h3>

                                                        <div class="card-tools">
                                                            <div class="rating">
                                                                @for ($i = 1; $i <= 5; $i++)
                                                                    @if ($i <= $ticket->rating)
                                                                        <i class="fas fa-star text-warning"></i>
                                                                        <!-- Bintang kuning untuk rating -->
                                                                    @else
                                                                        <i class="far fa-star text-muted"></i>
                                                                        <!-- Bintang kosong -->
                                                                    @endif
                                                                @endfor
                                                            </div>
                                                        </div>
                                                        <!-- /.card-tools -->
                                                    </div>
                                                    <!-- /.card-header -->
                                                    <div class="card-body">
                                                        {{ $ticket->feedback }}
                                                    </div>
                                                    <!-- /.card-body -->
                                                </div>
                                                <!-- /.card -->
                                            </div>
                                        @endif
                                    </section>
                                    <div class="card direct-chat direct-chat-primary">
                                        <div class="card-header ui-sortable-handle" style="cursor: move;">
                                            <h3 class="card-title">Direct Chat</h3>
                                            <div class="card-tools">

                                                <button type="button" class="btn btn-tool"
                                                    data-card-widget="collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            <div class="direct-chat-messages">
                                                @if ($ticket->notes->isEmpty())
                                                    <p class="text-center text-muted">Belum ada catatan untuk tiket
                                                        ini.</p>
                                                @else
                                                    @foreach ($ticket->notes as $note)
                                                        @if ($note->user_id == auth()->id())
                                                            <!-- Chat untuk user yang sedang login (di kanan) -->
                                                            <div class="direct-chat-msg right">
                                                                <div class="direct-chat-infos clearfix">
                                                                    <span
                                                                        class="direct-chat-name float-right">{{ $note->user->name }}</span>
                                                                    <span class="direct-chat-timestamp float-left">
                                                                        {{ $note->created_at->format('d M H:i') }}
                                                                    </span>
                                                                </div>
                                                                <div class="direct-chat-text">
                                                                    {{ $note->note }}
                                                                </div>
                                                            </div>
                                                        @else
                                                            <!-- Chat untuk user lain (di kiri) -->
                                                            <div class="direct-chat-msg">
                                                                <div class="direct-chat-infos clearfix">
                                                                    <span class="direct-chat-name float-left">
                                                                        {{ $note->user->name }}
                                                                    </span>
                                                                    <span class="direct-chat-timestamp float-right">
                                                                        {{ $note->created_at->format('d M H:i') }}
                                                                    </span>
                                                                </div>
                                                                <span class="direct-chat-text">
                                                                    {{ $note->note }}
                                                                </span>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>

                                        {{-- <div class="card-footer">
                                            <form action="#" method="post">
                                                <div class="input-group">
                                                    <input type="text" name="message"
                                                        placeholder="Type Message ..." class="form-control">
                                                    <span class="input-group-append">
                                                        <button type="button" class="btn btn-primary">Send</button>
                                                    </span>
                                                </div>
                                            </form>
                                        </div> --}}

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Ticket Details</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form id="editTicketForm" method="POST"
                                        action="{{ route('ticket.update', ['id' => $ticket->id]) }}">
                                        @csrf
                                        @method('PUT')
                                        <form id="editTicketForm">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>User Name</label>
                                                            <input type="text" id="nama"
                                                                value="{{ $ticket->nama }}" class="form-control"
                                                                placeholder="Full Name" disabled>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Application</label>
                                                            <select class="form-control" id="aplikasi"
                                                                name="aplikasi" disabled>
                                                                <option value="{{ $ticket->aplikasi }}">
                                                                    {{ $ticket->aplikasi }}</option>
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Subject</label>
                                                            <input type="text" id="subjek" name="subjek"
                                                                class="form-control" value="{{ $ticket->subjek }}"
                                                                placeholder="Insert Subject" disabled>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Description</label>
                                                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" placeholder="Enter Description"
                                                                disabled>{{ $ticket->deskripsi }}</textarea>
                                                        </div>
                                                        @if ($ticket->prioritas !== null)
                                                            <div class="form-group">
                                                                <label>Priority</label>
                                                                <select class="form-control" id="prioritas"
                                                                    name="prioritas" disabled>
                                                                    <option value="{{ $ticket->prioritas }}" selected
                                                                        disabled>{{ $ticket->prioritas }}</option>
                                                                    <option value="Urgent"
                                                                        {{ $ticket->prioritas === 'Urgent' ? 'disabled' : '' }}>
                                                                        Urgent</option>
                                                                    <option value="High"
                                                                        {{ $ticket->prioritas === 'High' ? 'disabled' : '' }}>
                                                                        High</option>
                                                                    <option value="Medium"
                                                                        {{ $ticket->prioritas === 'Medium' ? 'disabled' : '' }}>
                                                                        Medium</option>
                                                                    <option value="Low"
                                                                        {{ $ticket->prioritas === 'Low' ? 'disabled' : '' }}>
                                                                        Low</option>
                                                                </select>
                                                            </div>
                                                        @else
                                                            <div class="form-group">
                                                                <label>Priority</label>
                                                                <select class="form-control" id="prioritas"
                                                                    name="prioritas">
                                                                    <option value="--placeholderPrio" selected
                                                                        disabled>--
                                                                        Select Priority --</option>
                                                                    <option value="Urgent">Urgent</option>
                                                                    <option value="High">High</option>
                                                                    <option value="Medium">Medium</option>
                                                                    <option value="Low">Low</option>
                                                                </select>
                                                            </div>
                                                        @endif

                                                        <div class="form-group">
                                                            <label>Status</label>
                                                            <select class="form-control" id="status"
                                                                name="status" onchange="toggleTimITSelect()">
                                                                <option value="pending"
                                                                    {{ $ticket->status == 'pending' ? 'selected' : '' }}>
                                                                    Pending</option>
                                                                <option value="open"
                                                                    {{ $ticket->status == 'open' ? 'selected' : '' }}>
                                                                    Open</option>
                                                                <option value="closed"
                                                                    {{ $ticket->status == 'closed' ? 'selected' : '' }}>
                                                                    Closed</option>
                                                            </select>
                                                        </div>
                                                        <input type="hidden" id="agent" value="{{ $ticket->agent ?? '' }}">
                                                        <div class="form-group" id="timITSelect"
                                                            style="display: none;">
                                                            <label>Assign to Tim IT</label>
                                                            <select class="form-control" id="timIT"
                                                                name="timIT">
                                                                <option value="" selected disabled>-- Select Tim
                                                                    IT --</option>
                                                                @foreach ($timITUsers as $user)
                                                                    <option value="{{ $user->id }}">
                                                                        {{ $user->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        @if ($ticket->agent !== null && $agent !== null)
                                                            <div class="form-group">
                                                                <label>Assign to Tim IT</label>
                                                                <select class="form-control" id="timIT" name="timIT" disabled>
                                                                    <option value="" selected disabled>-- Select Tim IT --</option>
                                                                    <option value="{{ $ticket->agent }}" selected disabled>{{ $agent->name }}</option>
                                                                </select>
                                                            </div>
                                                        @endif

                                                        {{-- <p class="text-danger text-sm mt-2">
                                                            <strong>Note:</strong> Sebelum melakukan closed ticket,
                                                            pastikan tiket sudah diberi feedback.
                                                        </p> --}}

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
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
    <script>
        $('#myModal').on('shown.bs.modal', function() {
            $('#myInput').trigger('focus')
        })
    </script>
    <!-- Script untuk menangani submit form -->
    <script>
        $(document).ready(function() {
            $('#editTicketForm').submit(function(e) {
                e.preventDefault();

                var formData = $(this).serialize();

                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        // Handle success response
                        console.log(response);
                        $('#myModal').modal('hide');
                        // Optionally reload or update the page
                        location.reload(); // Reload the page
                    },
                    error: function(xhr, status, error) {
                        // Handle error response
                        console.error(error);
                        alert('An error occurred while updating the ticket.');
                    }
                });
            });
        });
    </script>

    <!-- Pusher -->
    <script src="{{ asset('path/to/your/compiled/js/file.js') }}"></script>
    <!-- jQuery -->
    <script src="{{ asset('template/plugins/jquery/jquery.min.js') }}"></script>
    <!--jQuery UI 1.11 .4-- >
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
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
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
    <script>
        function toggleTimITSelect() {
            var status = document.getElementById("status").value;
            var agent = document.getElementById("agent").value;
            var timITSelect = document.getElementById("timITSelect");

            if (status === "open" && (!agent || agent === "null")) {
                timITSelect.style.display = "block";
            } else {
                timITSelect.style.display = "none";
            }
        }

        // Pastikan saat halaman dimuat, form sesuai dengan status yang sudah ada
        document.addEventListener("DOMContentLoaded", function() {
            toggleTimITSelect();
        });
    </script>
</body>

</html>
