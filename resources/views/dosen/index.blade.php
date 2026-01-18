@extends('layouts.master')

@section('content')
<div class="pagetitle">
    <h1>Data Dosen</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Dosen</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="card-title mb-0">Tabel Dosen</h5>
            <a href="/dosen/create" class="btn btn-primary btn-sm">
                <i class="bi bi-plus"></i> Tambah Dosen
            </a>
        </div>

        <div class="card-body">
            <table class="table datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIDN</th>
                        <th>Nama Dosen</th>
                        <th>Email</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dosen as $d)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $d->nidn }}</td>
                        <td>{{ $d->nama_dosen }}</td>
                        <td>{{ $d->email }}</td>
                        <td class="text-center">
                            <a href="/dosen/{{ $d->id }}/edit" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil"></i>
                            </a>

                            <form action="/dosen/{{ $d->id }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Yakin hapus dosen ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
