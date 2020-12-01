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
                        <div class="col-md-12 mt-3">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Kota/Kabupaten</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pesantrens as $pesantren)
                                        <tr>
                                            <td>{{$pesantren->id}}</td>
                                            <td>{{$pesantren->name}}</td>
                                            <td>{{$pesantren->Regency->name}}</td>
                                            <td>
                                                @if ($pesantren->suspended)
                                                    <button class="btn btn-danger" disabled>
                                                        SUSPEND
                                                    </button>
                                                @else
                                                    <button class="btn btn-primary" disabled>
                                                        ACTIVE
                                                    </button>
                                                @endif
                                            </td>
                                            <td>
                                                <form action="{{route('superadmin.pesantren.changeSuspend', $pesantren->id)}}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    @if ($pesantren->suspended)
                                                        <input type="hidden" name="status" value="active">
                                                        <button class="btn btn-primary">
                                                            ACTIVE
                                                        </button>
                                                    @else
                                                        <input type="hidden" name="status" value="suspend">
                                                        <button class="btn btn-danger">
                                                            SUSPEND
                                                        </button>
                                                    @endif
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