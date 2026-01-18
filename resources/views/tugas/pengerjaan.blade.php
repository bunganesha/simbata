@extends('layouts.master')

@section('content')
<div class="container-fluid mt-4">
    <h2 class="text-primary fw-bold">Penilaian</h2>
     <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="/tugas">Management Tugas</a></li>
            <li class="breadcrumb-item active" aria-current="page">Input Nilai</li>
        </ol>
    </nav>
    <div class="card mb-4 shadow mt-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0 text-white">Tambah Penilaian Baru</h5>
        </div>
        <div class="card-body mt-3">
            <form action="{{ route('tugas.storePengerjaan') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <label>Pilih Mahasiswa</label>
                        <select name="id_mahasiswa" class="form-control" required>
                            @foreach($mahasiswa as $mhs)
                                <option value="{{ $mhs->id_mahasiswa }}">{{ $mhs->nama_mahasiswa }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label>Pilih Tugas</label>
                        <select name="id_tugas" class="form-control" required>
                            @foreach($all_tugas as $t)
                                <option value="{{ $t->id_tugas }}">{{ $t->judul_tugas }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label>Bobot SKS</label>
                        <input type="number" name="nilai" class="form-control" placeholder="0-100" required>
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary w-100"><i class="bi bi-plus-circle me-1"></i>Tambah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0 text-white">Daftar Nilai</h5>
        </div>
        <div class="card-body mt-3">
            <table class="table table-bordered table-striped">
    <thead class="table-light">
        <tr>
            <th>No</th>
            <th>Nama Mahasiswa</th>
            <th>Judul Tugas</th>
            <th>Bobot SKS</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($pengerjaan as $key => $p)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $p->nama_mahasiswa }}</td>
            <td>{{ $p->judul_tugas }}</td>
            <form action="{{ route('tugas.updateNilai', $p->id_pengerjaan) }}" method="POST">
                @csrf
                <td>
                    <input type="number" name="nilai" value="{{ $p->nilai }}" class="form-control form-control-sm" style="width: 80px">
                </td>
                <td>
                    <span class="badge {{ $p->nilai >= 75 ? 'bg-success' : 'bg-warning' }}">
                        {{ $p->status }}
                    </span>
                </td>
                <td>
                    <button type="submit" class="btn btn-sm btn-primary">Update</button>
                </td>
            </form>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center">Belum ada data nilai. Silakan tambah data melalui form di atas.</td>
        </tr>
        @endforelse
    </tbody>
</table>
        </div>
    </div>
</div>
@endsection