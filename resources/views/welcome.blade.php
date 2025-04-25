@extends('layout')

@section('title', 'Dashboard')

@section('konten')


<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body fw-bold">
                    <img width="45" height="45" src="https://img.icons8.com/color/48/ours.png" 
                    alt="ours"/> Jumlah Siswa : {{ $siswaJumlah }}
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" style="text-decoration: none;" href="{{ route('siswa.tampil') }}">Klik untuk detail</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body fw-bold">
                    <img width="45" height="45" src="https://img.icons8.com/external-flaticons-lineal-color-flat-icons/50/external-teacher-event-management-flaticons-lineal-color-flat-icons.png" 
                    alt="external-teacher-event-management-flaticons-lineal-color-flat-icons"/> Jumlah Guru : {{ $guruJumlah }}
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" style="text-decoration: none;" href="{{ route('guru.tampil') }}">Klik untuk detail</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body fw-bold">
                    <img width="45" height="45" src="https://img.icons8.com/color/48/user-group-man-woman.png"
                     alt="user-group-man-woman" /> Jumlah Staff : {{ $staffJumlah }}
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" style="text-decoration: none;" href="{{ route('staff.tampil') }}">Klik untuk detail</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">Danger Card</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-area me-1"></i>
                    Area Chart Example
                </div>
                <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-bar me-1"></i>
                    Bar Chart Example
                </div>
                <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
            </div>
        </div>
    </div>

</div>
@endsection