@extends('layouts.master')

@section('content')
<div class="container-fluid mt-4">
    <div class="card shadow">
        <div class="card-header text-dark">
            <h4 class="mb-0">Laporan Rekapitulasi Beban Akademik</h4>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nama Mahasiswa</th>
                        <th>Jumlah Tugas</th>
                        <th>Total Beban</th>
                        <th>Status Beban</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Data ini diambil dari Controller fungsi laporan() --}}
                    @foreach($laporan as $data)
                    <tr>
                        <td>{{ $data->nama_mahasiswa }}</td>
                        <td>{{ $data->jumlah_tugas}}</td>
                        <td>{{ $data->total_beban ?? 0 }}%</td>
                        <td>
                            <span class="badge {{ ($data->total_beban ?? 0) > 80 ? 'bg-danger' : 'bg-primary' }}">
                                {{ ($data->total_beban ?? 0) > 80 ? 'Overload' : 'Normal' }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection