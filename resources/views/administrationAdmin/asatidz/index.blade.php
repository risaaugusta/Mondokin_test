@extends('layouts.app')

@push('css')
    <link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data {{ env('TEXT_TEACHER', 'Asatidz') }}</h6>
                </div>
                <div class="card-body">
                    @include('layouts.alert')
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <a href="{{route('administrationadmin.asatidz.create')}}" class="btn btn-primary"">
                                Tambah {{ env('APP_TYPE') == 'school' ? 'Guru' : 'Asatidz' }}
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Foto</th>
                                            <th>NIP</th>
                                            <th>Nama</th>
                                            <th>Telepon</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($asatidzs as $asatidz)
                                            <tr>
                                                <td><img src="{{asset('storage/'.$asatidz->Asatidz->photo)}}" alt="asatidz photo" style="height: 100px"></td>
                                                <td>{{$asatidz->Asatidz->nip}}</td>
                                                <td>{{$asatidz->Asatidz->name}}</td>
                                                <td>{{$asatidz->Asatidz->phone}}</td>
                                                <td>
                                                    <a href="{{route('administrationadmin.asatidz.show', $asatidz->id)}}#schedule" class="btn btn-info" data-toggle="tooltip" data-placement="bottom" title="Jadwal Asatidz">
                                                        <i class="fas fa-fw fa-book"></i>
                                                    </a>
                                                    <a href="{{route('administrationadmin.asatidz.show', $asatidz->id)}}" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Lihat Detail Asatidz">
                                                        <i class="fas fa-fw fa-eye"></i>
                                                    </a>
                                                    <a href="{{route('administrationadmin.asatidz.edit', $asatidz->id)}}" class="btn btn-warning" data-toggle="tooltip" data-placement="bottom" title="Ubah Data Asatidz">
                                                        <i class="fas fa-fw fa-edit"></i>
                                                    </a>
                                                    <form action="{{route('administrationadmin.asatidz.destroy', $asatidz->id)}}" method="post" style="display: inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Hapus Data Asatidz">
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