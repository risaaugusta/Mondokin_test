@extends('layouts.app')

@push('css')
    <link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Pengajar Mata Pelajaran</h6>
                </div>
                <div class="card-body">
                    @include('layouts.alert')
                    <form action="{{route('administrationadmin.asatidzsubject.store')}}" method="post">
                        @csrf
                        <input type="hidden" name="subject_id" value="{{$subject->id}}">
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
                                                <th>Pilih</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($asatidzs as $asatidz)
                                                <tr>
                                                    <td>{{$asatidz->nip}}</td>
                                                    <td>{{$asatidz->name}}</td>
                                                    <td>{{$asatidz->phone}}</td>
                                                    <td>
                                                        @switch($asatidz->employee_status)
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
                                                        <input type="checkbox" name="asatidz_id[]" value="{{$asatidz->id}}" class="form-control">
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-right mt-3">
                                        <button type="submit" class="btn btn-primary">Tambah Pengajar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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