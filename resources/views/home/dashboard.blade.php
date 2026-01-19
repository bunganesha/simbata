@extends('layouts.master')

@section('content')
<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
</div>

<section class="section dashboard">
    <div class="row">

        <!-- TOTAL MAHASISWA -->
        <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">
                <div class="card-body">
                    <h5 class="card-title">Mahasiswa <span>| Total</span></h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-people"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{ $totalMahasiswa }}</h6>
                            <span class="text-success small pt-1 fw-bold">Total</span>
                            <span class="text-muted small pt-2 ps-1">Mahasiswa</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- TOTAL DOSEN -->
        <div class="col-xxl-4 col-md-6">
            <div class="card info-card revenue-card">
                <div class="card-body">
                    <h5 class="card-title">Dosen <span>| Total</span></h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-person-badge"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{ $totalDosen }}</h6>
                            <span class="text-success small pt-1 fw-bold">Total</span>
                            <span class="text-muted small pt-2 ps-1">Dosen</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection
