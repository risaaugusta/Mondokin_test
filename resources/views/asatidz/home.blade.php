@extends('layouts.app', ['pageTitle' => 'Selamat Datang Asatidz'])

@section('content')
    @if (count($salaries) > 0)
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data Gaji</h6>
                    </div>
                    <div class="card-body">
                        @include('layouts.alert')
                        <div class="row">
                            <div class="col-md-12 mt-3">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>NIP</th>
                                                <th>Nama {{ env('TEXT_TEACHER', 'Asatidz') }}</th>
                                                <th>Tanggal</th>
                                                <th>Dokumen</th>
                                                <th>Jumlah</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($salaries as $salary)
                                                <tr>
                                                    <td>{{$salary->id}}</td>
                                                    <td>{{$salary->Asatidz->nip}}</td>
                                                    <td>{{$salary->Asatidz->name}}</td>
                                                    <td>{{$salary->date}}</td>
                                                    <td>
                                                        <a href="{{asset('storage/'. $salary->file)}}" class="text-primary">Lihat Dokumen</a>
                                                    </td>
                                                    <td>Rp. {{number_format($salary->amount)}}</td>
                                                    <td>
                                                        @if ($salary->received)
                                                            <h5 class="text-primary">Sudah Diterima</h5>
                                                        @else
                                                            <h5 class="text-danger">Belum Diterima</h5>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if (!$salary->received)
                                                            <a href="{{route('asatidz.salary.confirm', $salary->id)}}" class="btn btn-primary">Konfirmasi</a>
                                                        @endif
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
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Hadist Harian</h6>
                </div>
                <div class="card-body">
                    <p class="font-weight-normal">Sesungguhnya orang-orang yang beriman dan mengerjakan amal shalih, merekalah makhluk yang terbaik</p>
                    <p class="font-weight-lighter">QS Al-Bayyinah ayat 7</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Histori Absen</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table">
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Kegiatan</th>
                                    <th>Jadwal Absen</th>
                                </tr>
                                @foreach (Auth::user()->Asatidz->Absent as $absent)
                                    <tr>
                                        <td>{{$absent->id}}</td>
                                        <td>{{$absent->Schedule->name}}</td>
                                        <td>{{$absent->created_at}}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection