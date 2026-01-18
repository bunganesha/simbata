@extends('layouts.master')

@section('content')
<div class="pagetitle">
    <h1>Edit Mata Kuliah</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="/mata-kuliah">Mata Kuliah</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-8">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Form Edit Mata Kuliah</h5>

                    <form action="/mata-kuliah/{{ $mataKuliah->id }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Kode Mata Kuliah</label>
                            <input type="text"
                                   name="kode_matkul"
                                   class="form-control"
                                   value="{{ $mataKuliah->kode_matkul }}"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nama Mata Kuliah</label>
                            <input type="text"
                                   name="nama_matkul"
                                   class="form-control"
                                   value="{{ $mataKuliah->nama_matkul }}"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">SKS</label>
                            <input type="number"
                                   name="sks"
                                   class="form-control"
                                   value="{{ $mataKuliah->sks }}"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Dosen</label>
                            <select name="dosen_id" class="form-select" required>
                                @foreach ($dosen as $d)
                                    <option value="{{ $d->id }}"
                                        {{ $mataKuliah->dosen_id == $d->id ? 'selected' : '' }}>
                                        {{ $d->nama_dosen }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-flex gap-2">
                            <button class="btn btn-warning">
                                <i class="bi bi-pencil"></i> Update
                            </button>
                            <a href="/mata-kuliah" class="btn btn-secondary">
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
