@extends('layout.navbar')
@section('content')
    <div class="container-fluid">
        <!-- Judul halaman -->
        <h1 class="h4 mb-4 text-gray-800"><i class="fas fa-clone fa-fw mr-2"></i>User</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <!-- Judul form -->
                <h6 class="m-0 font-weight-bold">Ubah Data User</h6>
            </div>
            <div class="card-body">
                <!-- Form ubah data -->
                <form action="{{ route('admin.user.update', $user->id_user) }}" method="POST" class="needs-validation"
                    novalidate>
                    @csrf
                    @method('PUT')

                    <!-- Input hidden untuk ID user -->
                    <input type="hidden" name="kode_user" value="{{ $user->id_user }}">

                    <div class="form-group col-lg-5 pl-0">
                        <label>Nama <span class="text-danger">*</span></label>
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                            autocomplete="off" value="{{ old('nama', $user->nama) }}" required>
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @else
                            <div class="invalid-feedback">Nama user tidak boleh kosong.</div>
                        @enderror
                    </div>

                    <div class="form-group col-lg-5 pl-0">
                        <label>Email <span class="text-danger">*</span></label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            autocomplete="off" value="{{ old('email', $user->email) }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @else
                            <div class="invalid-feedback">Email tidak boleh kosong.</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control col-lg-5"
                            placeholder="Kosongkan password jika tidak diubah" autocomplete="off">
                        <div class="invalid-feedback">Password tidak boleh kosong.</div>
                    </div>

                    <div class="form-group">
                        <label>Role <span class="text-danger">*</span></label>
                        <select name="role" id="role" class="form-control col-lg-5" autocomplete="off" required>
                            <option disabled value="">-- Pilih --</option>
                            @foreach ($roles as $data)
                                <option value="{{ $data->id_role }}"
                                    {{ old('role', $user->id_role) == $data->id_role ? 'selected' : '' }}>
                                    {{ $data->nama_role }}
                                </option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">Role tidak boleh kosong.</div>
                    </div>

                    <hr class="mt-5">

                    <div class="form-group pt-3">
                        <!-- Tombol simpan data -->
                        <input type="submit" name="simpan" value="Simpan" class="btn btn-info pl-4 pr-4 mr-2">
                        <!-- Tombol kembali ke halaman tampil data -->
                        <a href="{{ route('admin.user.index') }}" class="btn btn-secondary pl-4 pr-4">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
