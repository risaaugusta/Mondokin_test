@extends('layouts.app')

@push('css')
    <link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Gaji</h6>
                </div>
                <div class="card-body">
                    @include('layouts.alert')
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <a href="{{route('financeadmin.salary.create')}}" class="btn btn-primary">
                                Tambah Gaji
                            </a>
                        </div>
                    </div>
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

    <script>
        $(function () {
          $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@endpush