@extends('layouts.app')

@push('css')
    <link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Raport</h6>
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
                                            <th>Tahun</th>
                                            <th>Semester</th>
                                            <th>Kategori</th>
                                            <th>Rapot</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (Auth::user()->Santri->Report as $report)
                                            <tr>
                                                <td>{{$report->id}}</td>
                                                <td>{{$report->year}}</td>
                                                <td>Semester {{$report->semester}}</td>
                                                <td>
                                                    @if ($report->category == 'academic')
                                                        <p class="text-primary">Akademik</p>
                                                    @else
                                                        <p class="text-info">Tahfidz</p>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{asset('storage/'.$report->file)}}" class="btn btn-info">Lihat Raport</a>
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