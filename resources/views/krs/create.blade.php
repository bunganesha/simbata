@extends('layouts.master')

@section('content')
<div class="pagetitle">
    <h1>Ambil Mata Kuliah (KRS)</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="/krs">KRS</a></li>
            <li class="breadcrumb-item active">Tambah</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-8">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Form KRS</h5>

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="/krs" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Mahasiswa</label>
                            <select name="mahasiswa_id" class="form-select" required>
                                <option value="">-- Pilih Mahasiswa --</option>
                                @foreach ($mahasiswa as $m)
                                    <option value="{{ $m->id }}">
                                        {{ $m->nim }} - {{ $m->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Mata Kuliah</label>
                            <select name="mata_kuliah_id" class="form-select" required>
                                <option value="">-- Pilih Mata Kuliah --</option>
                                @foreach ($mataKuliah as $mk)
                                    <option value="{{ $mk->id }}">
                                        {{ $mk->nama_matkul }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-flex gap-2">
                            <button class="btn btn-primary">
                                <i class="bi bi-save"></i> Simpan
                            </button>
                            <a href="/krs" class="btn btn-secondary">
                                Kembali
                            </a>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</section>
@endsection
