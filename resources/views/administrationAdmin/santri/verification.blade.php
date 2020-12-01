@extends('layouts.app')

@push('css')
    <link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Verifikasi {{ env('TEXT_STUDENT', 'Santri') }} Baru</h6>
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
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Telp</th>
                                            <th>TTL</th>
                                            <th>Tanggal Daftar</th>
                                            <th>Verifikasi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($santris as $santri)
                                            <tr>
                                                <td>{{$santri->id}}</td>
                                                <td>{{$santri->name}}</td>
                                                <td>{{$santri->address}}</td>
                                                <td>{{ $santri->phone }}</td>
                                                <td>{{$santri->birthplace}}, {{$santri->birthdate}}</td>
                                                <td>{{$santri->created_at}}</td>
                                                <td>
                                                    <a href="{{route('administrationadmin.santri.verification.detail', $santri->id)}}" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Verifikasi">
                                                        <i class="fas fa-fw fa-check"></i>
                                                    </a>
                                                    <form action="{{route('administrationadmin.santri.verification.reject', $santri->id)}}" method="post" style="display: inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Tolak Santri">
                                                            <i class="fas fa-fw fa-times"></i>
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