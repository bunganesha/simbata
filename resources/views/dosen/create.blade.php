@extends('layouts.master')

@section('content')
<div class="pagetitle">
    <h1>Tambah Dosen</h1>
</div>

<section class="section">
    <div class="card">
        <div class="card-body">
            <form action="/dosen" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">NIDN</label>
                    <input type="text" name="nidn" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Dosen</label>
                    <input type="text" name="nama_dosen" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <button class="btn btn-primary">Simpan</button>
                <a href="/dosen" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</section>
@endsection
