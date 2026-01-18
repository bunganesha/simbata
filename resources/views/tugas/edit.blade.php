@extends('layouts.master')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Edit Tugas Akademik</h3>
        </div>
        <form action="{{ route('tugas.update', $tugas->id_tugas) }}" method="POST">
            @csrf
            @method('PUT') <div class="card-body">
                <div class="form-group mb-3">
                    <label>Mata Kuliah</label>
                    <select name="id_matakuliah" class="form-control" required>
                        @foreach($matakuliah as $mk)
                            <option value="{{ $mk->id_matakuliah }}" {{ $tugas->id_matakuliah == $mk->id_matakuliah ? 'selected' : '' }}>
                                {{ $mk->nama_mk }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label>Judul Tugas</label>
                    <input type="text" name="judul_tugas" class="form-control" value="{{ $tugas->judul_tugas }}" required>
                </div>

                <div class="form-group mb-3">
                    <label>Deskripsi Tugas</label>
                    <textarea name="deskripsi" class="form-control" rows="3">{{ $tugas->deskripsi }}</textarea>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Bobot (%)</label>
                        <input type="number" step="0.01" name="bobot_persen" class="form-control" value="{{ $tugas->bobot_persen }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Deadline</label>
                        <input type="date" name="deadline" class="form-control" value="{{ $tugas->deadline }}" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Tipe Tugas</label>
                        <select name="tipe_tugas" class="form-control">
                            <option value="individu" {{ $tugas->tipe_tugas == 'individu' ? 'selected' : '' }}>Individu</option>
                            <option value="kelompok" {{ $tugas->tipe_tugas == 'kelompok' ? 'selected' : '' }}>Kelompok</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Tingkat Kesulitan</label>
                        <select name="tingkat_kesulitan" class="form-control">
                            <option value="ringan" {{ $tugas->tingkat_kesulitan == 'ringan' ? 'selected' : '' }}>Ringan</option>
                            <option value="sedang" {{ $tugas->tingkat_kesulitan == 'sedang' ? 'selected' : '' }}>Sedang</option>
                            <option value="berat" {{ $tugas->tingkat_kesulitan == 'berat' ? 'selected' : '' }}>Berat</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Perbarui Tugas</button>
                <a href="{{ route('tugas.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection