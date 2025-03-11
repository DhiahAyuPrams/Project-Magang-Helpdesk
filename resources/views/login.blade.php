<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" type="image/x-icon" href="{{ asset('gambar/logo.png') }}">
    <link href='https://fonts.googleapis.com/css?family=Nunito' rel='stylesheet'>
    <title>Login - Helpdesk Bina Marga</title>
    <link rel="stylesheet" type="text/css" href="{{ url('css/login.css') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- Correct Font Awesome link -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        .custom-img-size {
            width: 20%;
            /* Atur lebar sesuai keinginan, misalnya 50% */
            height: auto;
            /* Menjaga rasio aspek gambar */
        }

        /* Styling untuk slideshow */
        .mySlides {
            display: none;
            opacity: 0;
            transition: opacity 1s ease-in-out;
        }

        /* Gambar yang aktif akan terlihat */
        .mySlides.active {
            display: block;
            opacity: 1;
        }

        .circle {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #4CAF50;
            color: white;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            font-size: 18px;
            font-weight: bold;
        }

        .step {
            display: inline-flex; /* Pastikan langkah ditampilkan berurutan */
            justify-content: center;
            align-items: center;
            margin-right: 10px;
            cursor: pointer;
        }

        .step.active .circle {
            background-color: #ff6600;
        }

        /* Styling untuk tampilan panel */
        .panel {
            display: flex;
            justify-content: space-between;
            margin: 20px;
            flex-wrap: wrap;
        }

        .left-panel,
        .right-panel {
            width: 45%;
            margin-bottom: 20px;
        }

        .header h2 {
            font-size: 24px;
        }

        .steps {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .content {
            margin-top: 30px;
        }

        .message-content {
            position: relative;
        }

        /* Media queries untuk responsivitas */
        @media (max-width: 768px) {
            .steps {
                flex-direction: column;
                align-items: center;
            }

            .step {
                margin-bottom: 10px;
            }

            .circle {
                width: 40px;
                height: 40px;
                font-size: 20px;
            }

            .panel {
                flex-direction: column;
                align-items: center;
            }

            .left-panel,
            .right-panel {
                width: 90%;
                margin-bottom: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="login">
        <p class="login-header">
            <img src="{{ asset('gambar/logo.png') }}" width="100px" height="80px" />
        </p>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="login-container">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <p style="text-align: center;"><strong>Welcome, Please Login</strong></p>
                <p>
                    <input type="username" id="username" value="{{ old('username') }}" name="username" placeholder="Username">
                </p>
                <p>
                    <input type="password" id="password" name="password" placeholder="Password">
                </p>
                <p>
                    <button name="submit" type="submit" class="btn btn-primary">Login</button>
                </p>
            </div>
        </form>
    </div>

    <div class="panel">
        <div class="left-panel">
            <div class="header">
                <h2>Cara menggunakan Helpdesk</h2>
            </div>
            <div class="steps">
                <div class="step active" data-step="1">
                    <div class="circle">1</div>
                </div>
                <div class="step" data-step="2">
                    <div class="circle">2</div>
                </div>
                <div class="step" data-step="3">
                    <div class="circle">3</div>
                </div>
            </div>
            <div class="content">
                <h2>Step 1: Masuk dengan Username dan Password</h2>
                <p>Masuk dengan NIP dan masukkan kata sandi yang telah didaftarkan sebelumnya.</p>
            </div>
        </div>
        <div class="right-panel">
            <div class="message-content">
                <div class="slideshow-container">
                    <div class="mySlides fade">
                        <div class="numbertext">1 / 3</div>
                        <img src="{{ asset('gambar/login1.png') }}" style="width:100%">
                    </div>

                    <div class="mySlides fade">
                        <div class="numbertext">2 / 3</div>
                        <img src="{{ asset('gambar/create1.png') }}" style="width:100%">
                    </div>

                    <div class="mySlides fade">
                        <div class="numbertext">3 / 3</div>
                        <img src="{{ asset('gambar/jawaban1.png') }}" style="width:100%">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {
            const steps = document.querySelectorAll('.step');
            const content = document.querySelector('.content');

            const stepsContent = {
                1: {
                    title: 'Step 1: Masuk dengan username',
                    description: 'Masuk dengan NIP dan masukkan kata sandi yang telah didaftarkan sebelumnya.'
                },
                2: {
                    title: 'Step 2: Membuat Tiket Pengaduan',
                    description: 'Kamu dapat membuat pertanyaan/pengaduan dengan Helpdesk, mulai dari pertanyaan/pengaduan sederhana sampai situasi yang spesifik dan mendetail.'
                },
                3: {
                    title: 'Step 3: Dapatkan Jawaban dari Helpdesk dan Berikan Feedback',
                    description: 'Helpdesk siap menjawab semua pertanyaanmu. Berikan penilaian terhadap jawaban yang diberikan dan kinerja Tim IT yang menjawab.'
                }
            };

            // Menambahkan event listener untuk langkah-langkah
            steps.forEach(step => {
                step.addEventListener('click', () => {
                    // Hapus class active dari semua langkah
                    steps.forEach(s => s.classList.remove('active'));
                    // Tambahkan class active pada langkah yang diklik
                    step.classList.add('active');

                    // Ambil nomor langkah
                    const stepNumber = step.getAttribute('data-step');

                    // Perbarui konten berdasarkan langkah yang dipilih
                    content.querySelector('h2').innerText = stepsContent[stepNumber].title;
                    content.querySelector('p').innerText = stepsContent[stepNumber].description;

                    // Perbarui slide berdasarkan langkah
                    currentSlide(stepNumber);
                });
            });

            let slideIndex = 1;
            showSlides(slideIndex);

            // Fungsi untuk navigasi slide
            function plusSlides(n) {
                showSlides(slideIndex += n);
            }

            function currentSlide(n) {
                showSlides(slideIndex = n);
            }

            function showSlides(n) {
                let slides = document.getElementsByClassName("mySlides");

                // Reset semua slide
                for (let i = 0; i < slides.length; i++) {
                    slides[i].classList.remove("active");  // Hapus kelas active dari semua slide
                }

                // Tambahkan kelas active pada slide yang sesuai
                slides[slideIndex - 1].classList.add("active");  // Tampilkan slide yang sesuai
            }
        });
    </script>
</body>

</html>
