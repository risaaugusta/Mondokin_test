@extends('layouts.app')

@push('css')
    <link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Jadwal {{ env('TEXT_TEACHER', 'Asatidz') }}</h6>
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
                                            <th>Nama Jadwal</th>
                                            <th>Hari</th>
                                            <th>Waktu Mulai</th>
                                            <th>Waktu Akhir</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (Auth::user()->Asatidz->Schedule as $schedule)
                                            <tr>
                                                <td>{{$schedule->id}}</td>
                                                <td>{{$schedule->name}}</td>
                                                <td>{{$schedule->day}}</td>
                                                <td>{{$schedule->start_time}}</td>
                                                <td>{{$schedule->end_time}}</td>
                                                <td>
                                                    @if ($schedule->status == 'publish')
                                                        <p class="text-primary">Berlangsung</p>
                                                    @else
                                                        <p class="text-danger">Arsip</p>
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
@endsection

@push('js')
    <script src="{{asset('admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/js/demo/datatables-demo.js')}}"></script>
@endpush