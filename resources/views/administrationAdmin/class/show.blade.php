@extends('layouts.app')

@push('css')
    <link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Siswa di Jenjang {{$class->name}}</h6>
                </div>
                <div class="card-body">
                    @include('layouts.alert')
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <a href="{{route('administrationadmin.class.input', $class->id)}}" class="btn btn-primary"">
                                Tambah {{ env('TEXT_STUDENT', 'Santri') }}
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>NIS</th>
                                            <th>Nama</th>
                                            <th>TTL</th>
                                            <th>Tambahkan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($class->Santri as $santri)
                                            <tr>
                                                <td>{{$santri->nis}}</td>
                                                <td>{{$santri->name}}</td>
                                                <td>{{$santri->birthplace}}, {{$santri->birthdate}}</td>
                                                <td>
                                                    <form action="{{route('administrationadmin.class.remove', $santri->id)}}" method="post" style="display: inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="hidden" name="santri_id" value="{{$santri->id}}">
                                                        <input type="hidden" name="class_id" value="{{$class->id}}">
                                                        <button type="submit" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Hapus Santri">
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