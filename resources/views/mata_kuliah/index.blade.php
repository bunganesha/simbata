@extends('layouts.master')

@section('content')
<div class="pagetitle">
    <h1>Mata Kuliah</h1>
</div>

<section class="section">
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="card-title mb-0">Data Mata Kuliah</h5>
            <a href="/mata-kuliah/create" class="btn btn-primary btn-sm">
                <i class="bi bi-plus"></i> Tambah
            </a>
        </div>

        <div class="card-body">
            <table class="table datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>SKS</th>
                        <th>Dosen</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mataKuliah as $mk)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $mk->kode_matkul }}</td>
                        <td>{{ $mk->nama_matkul }}</td>
                        <td>{{ $mk->sks }}</td>
                        <td>{{ $mk->dosen->nama_dosen }}</td>
                        <td class="text-center">
                            <a href="/mata-kuliah/{{ $mk->id }}/edit" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil"></i>
                            </a>

                            <form action="/mata-kuliah/{{ $mk->id }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Hapus mata kuliah ini?')">
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
