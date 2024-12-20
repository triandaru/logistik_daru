<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Aplikasi Jasa Cuci Mobil dan Motor">

    <!-- Title -->
    <title>Aplikasi Logistik Makanan Ringan</title>

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="assets/img/makanan.png" type="image/x-icon">

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="assets/css/login.css" rel="stylesheet">
</head>

<body class="bg-gradient-warning">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <!-- logo -->
                                    <div class="text-center pb-3">
                                        <img src="assets/img/makanan.png" alt="Logo" width="70">
                                    </div>
                                    <!-- judul -->
                                    <div class="text-center pb-3">
                                        <h1 class="h5 text-gray-900 mb-4">Aplikasi Logistik Makanan</h1>
                                    </div>

                                    @error('error')
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <small>
                                                <strong><i class="fas fa-times-circle mr-1"></i>{{ $message }}</strong>
                                                <br>
                                                Email atau Password salah. Cek kembali Email dan Password Anda.
                                            </small>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @enderror

                                    <!-- form login -->
                                    <form action="{{ route('akses.login') }}" method="post"
                                        class="user needs-validation" novalidate>
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" name="email" id="email"
                                                class="form-control form-control-user @error('email') is-invalid @enderror"
                                                placeholder="Email" value="{{ old('email') }}" autocomplete="off"
                                                required>
                                            <div class="invalid-feedback">Email tidak boleh kosong.</div>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password"
                                                class="form-control form-control-user" placeholder="Password"
                                                autocomplete="off" required>
                                            <div class="invalid-feedback">Password tidak boleh kosong.</div>
                                        </div>
                                        <div class="form-group pt-3">
                                            <!-- tombol login -->
                                            <input type="submit" name="login" value="LOGIN"
                                                class="btn btn-warning btn-user btn-block">
                                        </div>

                                        <div class="text-center">
                                            <button type="button" class="btn btn-link" data-toggle="modal"
                                                data-target="#loginModal">
                                                Akses Login
                                            </button>
                                        </div>
                                    </form>

                                    <!-- Modal untuk menampilkan email dan password -->
                                    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog"
                                        aria-labelledby="loginModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="loginModalLabel">Informasi Login</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <strong>Email: admin@example.com</strong> <span
                                                        id="modalEmail"></span><br>
                                                    <strong>Password: password</strong> <span id="modalPassword"></span>
                                                </div>
                                                <div class="modal-body">
                                                    <strong>Email: user@example.com</strong> <span
                                                        id="modalEmail"></span><br>
                                                    <strong>Password: password</strong> <span id="modalPassword"></span>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Tutup</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- footer -->
                                    <div class="text-center mt-5">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="assets/js/form-validation.js"></script>

</body>

</html>
