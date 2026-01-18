@extends('layouts.master')

@section('content')
<div class="container">
    <h2 class="fw-bold text-primary">Manajemen Tugas & Beban Akademik</h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tugas & Beban Akademik</li>
        </ol>
    </nav>
    
    <div class="alert {{ $statusBeban == 'Overload' ? 'alert-danger' : 'alert-info' }}">
       <strong>Status Beban: {{ $statusBeban }}</strong> (Total Bobot: {{ $totalBeban }} SKS)
    </div> 

    <a href="{{ route('tugas.create') }}" class="btn btn-primary mb-3">
    <i class="bi bi-plus-circle me-1"></i> Tambah Tugas Baru
    </a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Deadline</th>
                <th>Bobot</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tugas as $t)
            <tr>
                <td>{{ $t->judul_tugas }}</td>
                <td>{{ $t->deadline }}</td>
                <td>{{ $t->bobot_persen }} SKS</td>
                <td>
                    <a href="{{ route('tugas.edit', $t->id_tugas) }}" class="btn btn-sm btn-warning">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection