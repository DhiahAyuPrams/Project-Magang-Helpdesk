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
        .wrapper,
        .content-wrapper,
        .main-footer {
            margin-left: 0 !important;
            transition: none !important;
            width: 100% !important;
        }

        .card-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            /* Tinggi minimum setara dengan tinggi viewport */
        }
    </style>
</head>

<body class="hold-transition layout-fixed">
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{ asset('gambar/logo.png') }}" alt="AdminLTELogo" height="100"
            width="auto">
    </div>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: khaki;">
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
                    <a class="dropdown-item" href="/logout"
                        style="display: inline-block; padding: 10px; border-radius: 5px; 
                                transition: background-color 0.3s ease-in-out;"
                        onmouseover="this.style.backgroundColor='rgba(0, 0, 0, 0.1)';"
                        onmouseout="this.style.backgroundColor='transparent';">
                        Logout
                    </a>
                </div>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper"
        style="margin-left: 0 !important; transition: none !important; width: 100% !important;">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="m-0" style="padding-left: 100px;">Create Ticket</h1>
                    </div><!-- /.col -->
                    @if (Auth::user()->role == 'Pimpinan')
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/dashboard-user">Home</a></li>
                                <li class="breadcrumb-item"><a href="/ticket-list">Ticket List</a></li>
                                <li class="breadcrumb-item active">New Ticket</li>
                            </ol>
                        </div><!-- /.col -->
                    @else
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/dashboard-user">Home</a></li>
                                <li class="breadcrumb-item active">New Ticket</li>
                            </ol>
                        </div><!-- /.col -->
                    @endif
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="card">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <div class="card-body">
                                <form action="{{ route('store_ticket') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="hidden" name="nama" value="{{ auth()->user()->name }}">
                                            <div class="form-group">
                                                <label>Subject</label>
                                                <input type="text" class="form-control" name="subjek"
                                                    placeholder="Insert Subject" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Application</label>
                                                <select class="form-control application" name="aplikasi"
                                                    onchange="hideAppPlaceholder()" required>
                                                    <option value="--placeholderApp">-- Select Application --</option>
                                                    <option Value="INSLOPE (Sistem Manajemen Lereng Jalan)">INSLOPE
                                                        (Sistem Manajemen Lereng Jalan)</option>
                                                    <option Value="SMD (Sistem Masukan Data)">SMD (Sistem Masukan Data)
                                                    </option>
                                                    <option value="SIDAKO-POK">SIDAKO-POK</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea class="form-control" name="deskripsi" rows="3" placeholder="Enter Description" required></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="formFileMultiple" class="form-label">Attachment</label>
                                                <div class="input-group">
                                                    <input class="form-control" type="file" name="attachments[]"
                                                        id="formFileMultiple" multiple accept="image/*">
                                                    <button type="button" class="btn btn-danger"
                                                        id="cancelUpload">&times;</button>
                                                </div>
                                            </div>

                                            <!-- Tempat untuk menampilkan preview gambar -->
                                            <div id="previewContainer"
                                                style="margin-top: 10px; display: flex; gap: 10px; flex-wrap: wrap;">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit"
                                                class="btn btn-primary mr-5 mb-2 mt-3">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row justify-content-center mt-5">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header text-center">
                                <h1><strong>F A Q </strong></h1>
                                <h6>Frequently Asked Questions</h6>
                            </div>
                            <div class="card-body" id="accordion">
                                @foreach ($faqs as $index => $faq)
                                    <div class="card card-primary card-outline">
                                        <a class="d-block w-100 collapsed" data-toggle="collapse"
                                            href="#collapse{{ $index }}" aria-expanded="false">
                                            <div class="card-header">
                                                <h4 class="card-title w-100">
                                                    {{ $loop->iteration }}. {{ $faq->question }}
                                                </h4>
                                            </div>
                                        </a>
                                        <div id="collapse{{ $index }}" class="collapse"
                                            data-parent="#accordion">
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
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer"
        style="margin-left: 0 !important; transition: none !important; width: 100% !important;">
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
    <script>
        function hideAppPlaceholder() {
            var placeholderOption = document.querySelector('.form-control.application option[value="--placeholderApp"]');
            if (placeholderOption) {
                placeholderOption.remove();
            }
        }
    </script>
    <script>
        document.getElementById("cancelUpload").addEventListener("click", function() {
            document.getElementById("formFileMultiple").value = ""; // Reset input file
        });
    </script>


    <script>
        document.getElementById('formFileMultiple').addEventListener('change', function(event) {
            let previewContainer = document.getElementById('previewContainer');
            previewContainer.innerHTML = '';

            let files = event.target.files;
            if (files.length > 0) {
                for (let file of files) {
                    let reader = new FileReader();
                    reader.onload = function(e) {
                        let img = document.createElement('img');
                        img.src = e.target.result;
                        img.style.width = '100px';
                        img.style.height = '100px';
                        img.style.objectFit = 'cover';
                        img.style.borderRadius = '1px';
                        img.style.boxShadow = '0px 4px 8px rgba(0,0,0,0.2)';
                        previewContainer.appendChild(img);
                    };
                    reader.readAsDataURL(file);
                }
            }
        });

        
        document.getElementById('cancelUpload').addEventListener('click', function() {
            document.getElementById('formFileMultiple').value = ''; 
            document.getElementById('previewContainer').innerHTML = '';
        });
    </script>
</body>

</html>
