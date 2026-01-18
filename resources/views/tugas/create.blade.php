@extends('layouts.master')

@section('content')
<div class="container mt-4">
    <h2 class="text-primary fw-bold">Tambah Tugas Akademik</h2>
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
        <li class="breadcrumb-item"><a href="/tugas">Tugas & Beban Akademik</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Tugas Akademik</li>
    </ol>
    </nav>
    <div class="row justify-content-center mt-4">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header text-dark">
                    <h4 class="mb-0">Form Tugas Akademik</h4>
                </div>
                <div class="card-body">
                   <form action="{{ route('tugas.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label>Judul Tugas</label>
                            <input type="text" name="judul_tugas" class="form-control" placeholder="Masukkan Judul Tugas" required>
                        </div>

                        <div class="form-group mb-3">
                            <label>Mata Kuliah</label>
                            <select name="id_matakuliah" class="form-control" required>
                                <option value="">-- Pilih Mata Kuliah --</option>
                                @foreach($matakuliah as $mk)
                                    <option value="{{ $mk->id_matakuliah }}">{{ $mk->nama_mk }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label>Deskripsi Tugas</label>
                            <textarea name="deskripsi" class="form-control" rows="3"></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                <label>Bobot (%)</label>
                                <input type="number" step="0.01" name="bobot_persen" class="form-control" placeholder="Contoh: 20.00" required>
                                <small class="text-muted">Digunakan untuk menghitung beban akademik mahasiswa.</small>
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label>Batas Waktu (Deadline)</label>
                                <input type="date" name="deadline" class="form-control" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                <label>Tipe Tugas</label>
                                <select name="tipe_tugas" class="form-control">
                                    <option value="individu">Individu</option>
                                    <option value="kelompok">Kelompok</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label>Tingkat Kesulitan</label>
                                <select name="tingkat_kesulitan" class="form-control">
                                    <option value="ringan">Ringan</option>
                                    <option value="sedang">Sedang</option>
                                    <option value="berat">Berat</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer d-flex justify-content-between">
                        <a href="{{ route('tugas.index') }}" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-success">Simpan Tugas</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection