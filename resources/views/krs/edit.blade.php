@extends('layouts.master')

@section('content')
<div class="pagetitle">
    <h1>Edit KRS</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="/krs">KRS</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-8">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Form Edit KRS</h5>

                    <form action="/krs/{{ $krs->id }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Mahasiswa</label>
                            <select name="mahasiswa_id" class="form-select" required>
                                @foreach ($mahasiswa as $m)
                                    <option value="{{ $m->id }}"
                                        {{ $krs->mahasiswa_id == $m->id ? 'selected' : '' }}>
                                        {{ $m->nim }} - {{ $m->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Mata Kuliah</label>
                            <select name="mata_kuliah_id" class="form-select" required>
                                @foreach ($mataKuliah as $mk)
                                    <option value="{{ $mk->id }}"
                                        {{ $krs->mata_kuliah_id == $mk->id ? 'selected' : '' }}>
                                        {{ $mk->nama_matkul }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-flex gap-2">
                            <button class="btn btn-warning">
                                <i class="bi bi-pencil"></i> Update
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
