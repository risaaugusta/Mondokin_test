@extends('layouts.app')

@push('css')
    <link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data {{ env('TEXT_STUDENT', 'Santri') }}</h6>
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
                                            <th>{{ env('TEXT_STUDENT', 'Santri') }}</th>
                                            <th>Kelas</th>
                                            <th>Nominal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($santris as $santri)
                                            <tr>
                                                <td>{{$santri->id}}</td>
                                                <td>{{$santri->Santri->name}} ({{$santri->Santri->nis}})</td>
                                                <td>
                                                    @isset($santri->Santri->class_id)
                                                        {{ $santri->Santri->Classes->name }}
                                                        @else
                                                        -
                                                    @endisset    
                                                </td>
                                                <td>Rp. {{number_format($santri->Santri->balance)}}</td>
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