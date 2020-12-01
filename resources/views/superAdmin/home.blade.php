@extends('layouts.app', ['pageTitle' => 'Selamat Datang Super Admin'])

@section('content')
    <div class="row">
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Institusi</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$total_pesantren}}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-school fa-2x text-gray-300"></i>
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Institusi Suspended</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$suspended_pesantren}}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-exclamation-triangle fa-2x text-gray-300"></i>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection