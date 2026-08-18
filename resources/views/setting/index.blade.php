@extends('app')

@section('content')
<div class="container-fluid py-3">

    <!-- Menampilkan pesan sukses jika ada -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        {{-- <div class="card-header fw-semibold">
            <h5 class="mb-0">Setting Aplikasi</h5>
        </div> --}}
        <div class="card-body">
            <form action="{{ route('setting.update') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Input Nama Perusahaan -->
                <div class="mb-3">
                    <label for="company_name" class="form-label fw-bold">Nama Perusahaan</label>
                    <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Masukan Nama Perusahaan" value="{{ $setting->company_name ?? '' }}">
                </div>

                <!-- Input Nama Aplikasi -->
                <div class="mb-3">
                    <label for="app_name" class="form-label fw-bold">Nama Aplikasi</label>
                    <input type="text" class="form-control" id="app_name" name="app_name" placeholder="Masukan Nama Aplikasi" value="{{ $setting->app_name ?? '' }}">
                </div>

                <!-- Input Alamat -->
                <div class="mb-3">
                    <label for="address" class="form-label fw-bold">Alamat Perusahaan</label>
                    <textarea class="form-control" id="address" name="address" rows="3" placeholder="Masukan Alamat Perusahaan">{{ $setting->address ?? '' }}</textarea>
                </div>

                <!-- Menampilkan Logo Saat Ini -->
                <div class="mb-3">
                    <label class="form-label fw-bold d-block">Logo Saat Ini</label>
                    @if(isset($setting) && $setting->logo_path)
                        <div class="d-inline-block bg-white p-2 border" style="box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                            <img src="{{ asset('storage/' . $setting->logo_path) }}" width="150" alt="Logo Perusahaan" style="object-fit: contain;">
                        </div>
                    @else
                        <span class="text-muted fst-italic">Belum ada logo yang di-upload.</span>
                    @endif
                </div>

                <!-- Input Upload Logo Baru -->
                <div class="mb-4">
                    <label for="logo" class="form-label fw-bold">Upload Logo Baru</label>
                    <input type="file" class="form-control" id="logo" name="logo" accept="image/*">
                    <div class="form-text">Biarkan kosong jika tidak ingin mengubah logo</div>
                </div>

                <!-- Tombol Simpan -->
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary px-4">Simpan Pengaturan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
