@extends('layouts.app')

@push('css')
    <link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Institusi</h6>
                </div>
                <div class="card-body">
                    @include('layouts.alert')
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <a href="{{route('superadmin.pesantren.create')}}" class="btn btn-primary">
                                Tambah Institusi
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
                                            <th>Nama</th>
                                            <th>Kota/Kabupaten</th>
                                            <th>Bergabung</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pesantrens as $pesantren)
                                            <tr>
                                                <td>{{$pesantren->id}}</td>
                                                <td>{{$pesantren->name}}</td>
                                                <td>{{$pesantren->Regency->name}}</td>
                                                <td>{{$pesantren->created_at->format('d-m-Y')}}</td>
                                                <td>
                                                    <a href="{{route('superadmin.pesantren.show', $pesantren->id)}}" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Lihat Detail Pesantren">
                                                        <i class="fas fa-fw fa-eye"></i>
                                                    </a>
                                                    <a href="{{route('superadmin.pesantren.edit', $pesantren->id)}}" class="btn btn-warning" data-toggle="tooltip" data-placement="bottom" title="Ubah Data Pesantren">
                                                        <i class="fas fa-fw fa-edit"></i>
                                                    </a>
                                                    <form action="{{route('superadmin.pesantren.destroy', $pesantren->id)}}" method="post" style="display: inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Hapus Data Pesantren">
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