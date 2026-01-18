<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Login | SIMBATA</title>

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">

    <!-- Template Main CSS -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>

<body>

<main>
    <div class="container">

        <section
            class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        <!-- Logo / Judul -->
                        <div class="d-flex justify-content-center py-4">
                            <a href="#" class="logo d-flex align-items-center w-auto">
                                <span class="d-none d-lg-block">SIMBATA</span>
                            </a>
                        </div>

                        <!-- Card Login -->
                        <div class="card mb-3">
                            <div class="card-body">

                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">
                                        Login SIMBATA
                                    </h5>
                                    <p class="text-center small">
                                        Sistem Beban Tugas Akademik
                                    </p>
                                </div>

                                {{-- Error Login --}}
                                @if(session()->has('loginError'))
                                    <div class="alert alert-danger">
                                        {{ session('loginError') }}
                                    </div>
                                @endif

                                <form class="row g-3" action="/login" method="POST">
                                    @csrf

                                    <div class="col-12">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" required>
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" required>
                                    </div>

                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">
                                            Login
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>

                        <!-- Footer kecil -->
                        <div class="credits text-center">
                            © {{ date('Y') }} SIMBATA
                        </div>

                    </div>
                </div>
            </div>

        </section>

    </div>
</main>

<!-- Vendor JS Files -->
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>
