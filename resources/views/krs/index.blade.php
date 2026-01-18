@extends('layouts.master')

@section('content')
<div class="pagetitle">
    <h1>Data KRS</h1>
</div>

<section class="section">
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="card-title mb-0">Data KRS</h5>
            <a href="/krs/create" class="btn btn-primary btn-sm">
                <i class="bi bi-plus"></i> Ambil Mata Kuliah
            </a>
        </div>

        <div class="card-body">
            <table class="table datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Mahasiswa</th>
                        <th>Mata Kuliah</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($krs as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->mahasiswa->nama }}</td>
                        <td>{{ $item->mataKuliah->nama_matkul }}</td>
                        <td class="text-center">
                            <a href="/krs/{{ $item->id }}/edit" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil"></i>
                            </a>

                            <form action="/krs/{{ $item->id }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Hapus KRS ini?')">
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
