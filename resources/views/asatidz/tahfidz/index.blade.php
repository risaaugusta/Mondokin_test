@extends('layouts.app')

@push('css')
    <link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Tahfidz</h6>
                </div>
                <div class="card-body">
                    @include('layouts.alert')
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <a href="{{route('asatidz.tahfidz.create')}}" class="btn btn-primary"">
                                Tambah Data Tahfidz
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
                                            <th>Santri</th>
                                            <th>Tipe</th>
                                            <th>Halaman</th>
                                            <th>Ayat</th>
                                            <th>Catatan</th>
                                            <th>Tanggal</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (Auth::user()->Asatidz->Tahfidz as $tahfidz)
                                            <tr>
                                                <td>{{$tahfidz->id}}</td>
                                                <td>{{$tahfidz->Santri->name}}</td>
                                                <td>{{$tahfidz->type}}</td>
                                                <td>{{$tahfidz->page_first}} - {{$tahfidz->page_end}}</td>
                                                <td>{{$tahfidz->ayat_first}} - {{$tahfidz->ayat_end}}</td>
                                                <td>{{$tahfidz->notes ?: '-'}}</td>
                                                <td>{{$tahfidz->created_at->format('d-m-Y')}}</td>
                                                <td>
                                                    <a href="{{route('asatidz.tahfidz.edit', $tahfidz->id)}}" class="btn btn-warning" data-toggle="tooltip" data-placement="bottom" title="Ubah Mata Pelajaran">
                                                        <i class="fas fa-fw fa-edit"></i>
                                                    </a>
                                                    <form action="{{route('asatidz.tahfidz.destroy', $tahfidz->id)}}" method="post" style="display: inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Hapus Mata Pelajaran">
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