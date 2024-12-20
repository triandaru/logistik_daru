@extends('layout.navbar')
@section('content')
    <div class="container-fluid">
        <!-- judul halaman -->
        <h1 class="h4 mb-4 text-gray-800"><i class="fas fa-clone fa-fw mr-2"></i>User</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <!-- judul form -->
                <h6 class="m-0 font-weight-bold">Entri Data User</h6>
            </div>
            <div class="card-body">
                <!-- form entri data -->
                <form action="{{ route('admin.user.store') }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    <div class="form-group col-lg-5 pl-0">
                        <label>Nama User <span class="text-danger">*</span></label>
                        <input type="text" name="nama" class="form-control" autocomplete="off" required>
                        <div class="invalid-feedback">Nama user tidak boleh kosong.</div>
                    </div>

                    <div class="form-group col-lg-5 pl-0">
                        <label>Email <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend"></div>
                            <input type="email" name="email" class="form-control" autocomplete="off" required>
                            <div class="invalid-feedback">Email tidak boleh kosong.</div>
                        </div>
                    </div>

                    <div class="form-group col-lg-5 pl-0">
                        <label>Password <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend"></div>
                            <input type="password" id="password" name="password" class="form-control" autocomplete="off"
                                required>
                            <div class="invalid-feedback">Password tidak boleh kosong.</div>
                        </div>
                        <small id="passwordAlert" class="text-danger" style="display: none;">Password harus minimal 8
                            karakter.</small>
                    </div>


                    <div class="form-group">
                        <label>Role <span class="text-danger">*</span></label>
                        <select name="role" id="role" class="form-control col-lg-5" autocomplete="off" required>
                            <option selected disabled value="">-- Pilih --</option>
                            @foreach ($roles as $data)
                                <option value="{{ $data->id_role }}">
                                    {{ $data->nama_role }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">Role tidak boleh kosong.</div>
                    </div>

                    <hr class="mt-5">

                    <div class="form-group pt-3">
                        <!-- tombol simpan data -->
                        <input type="submit" class="btn btn-info pl-4 pr-4 mr-2">
                        <!-- tombol kembali ke halaman tampil data -->
                        <a href="{{ route('admin.user.index') }}" class="btn btn-secondary pl-4 pr-4">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('password').addEventListener('input', function() {
            const passwordInput = this.value;
            const passwordAlert = document.getElementById('passwordAlert');

            // Tampilkan alert jika panjang password kurang dari 8 karakter
            if (passwordInput.length < 8) {
                passwordAlert.style.display = 'block';
            } else {
                passwordAlert.style.display = 'none';
            }
        });
    </script>
@endsection
