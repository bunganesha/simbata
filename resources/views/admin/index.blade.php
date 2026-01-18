@extends('layouts.master')

@section('content')
<div class="pagetitle">
    <h1>Admin</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Admin</li>
        </ol>
    </nav>
</div>

<div class="content-wrapper">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-header">
                            <h1>Halaman Data Admin</h1>
                            <a href="/admin/create" class="btn btn-outline-primary">
                                Tambah Data
                            </a>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($admin as $a)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $a->nama }}</td>
                                            <td>{{ $a->email }}</td>
                                            <td>
                                                <a href="/admin/{{ $a->id_admin }}/edit" class="btn btn-warning">
                                                    Edit
                                                </a>
                                                <a href="/admin/{{ $a->id_admin }}/delete" class="btn btn-danger"
                                                   onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                                    Hapus
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
