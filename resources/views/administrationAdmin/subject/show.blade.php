@extends('layouts.app')

@push('css')
    <link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Pengajar Mata Pelajaran</h6>
                </div>
                <div class="card-body">
                    @include('layouts.alert')
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <a href="{{route('administrationadmin.asatidzsubject.create', $subject->id)}}" class="btn btn-primary"">
                                Tambah Pengajar
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>NIP</th>
                                            <th>Nama</th>
                                            <th>Telepon</th>
                                            <th>Status Karyawan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subject->AsatidzSubject as $asatidz)
                                            <tr>
                                                <td>{{$asatidz->Asatidz->nip}}</td>
                                                <td>{{$asatidz->Asatidz->name}}</td>
                                                <td>{{$asatidz->Asatidz->phone}}</td>
                                                <td>
                                                    @switch($asatidz->Asatidz->employee_status)
                                                        @case('permanent')
                                                            Pegawai Permanan
                                                            @break
                                                        @case('contract')
                                                            Pegawai Kontrak
                                                            @break
                                                        @case('hononary')
                                                            Honorer
                                                            @break
                                                        @case('outsource')
                                                            Outsourcing
                                                            @break
                                                    @endswitch
                                                </td>
                                                <td>
                                                    <form action="{{route('administrationadmin.asatidzsubject.destroy', $asatidz->id)}}" method="post" style="display: inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Hapus Pengajar">
                                                            <i class="fas fa-fw fa-trash"></i>
                                                        </button>
                                                    </form>
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