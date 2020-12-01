@extends('layouts.app')

@push('css')
    <link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Pengumuman</h6>
                </div>
                <div class="card-body">
                    @include('layouts.alert')
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <a href="{{route('administrationadmin.announcement.create')}}" class="btn btn-primary"">
                                Tambah Pengumuman
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Foto</th>
                                            <th>Deskripsi</th>
                                            <th>Tanggal Mulai</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($announcements as $index => $announcement)
                                            <tr>
                                                <td>{{++$index}}</td>
                                                <td>{{$announcement->title}}</td>
                                                <td>
                                                    @isset($announcement->photo)
                                                        <a href="{{ asset('storage/'.$announcement->photo) }}">Lihat foto</a>
                                                    @endisset
                                                </td>
                                                <td>{{$announcement->description}}</td>
                                                <td>{{$announcement->start_date}} s/d {{$announcement->end_date}} </td>
                                                <td>
                                                    <a href="{{route('administrationadmin.announcement.edit', $announcement->id)}}" class="btn btn-warning" data-toggle="tooltip" data-placement="bottom" title="Ubah Pengumuman">
                                                        <i class="fas fa-fw fa-edit"></i>
                                                    </a>
                                                    <form action="{{route('administrationadmin.announcement.destroy', $announcement->id)}}" method="post" style="display: inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Hapus Pengumuman">
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