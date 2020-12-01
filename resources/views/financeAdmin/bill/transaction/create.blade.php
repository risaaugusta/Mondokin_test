@extends('layouts.app')

@push('css')
    <link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar {{ env('TEXT_STUDENT', 'Santri') }}</h6>
                </div>
                <div class="card-body">
                    @include('layouts.alert')
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <form action="{{route('financeadmin.billTransaction.storeAll')}}" method="post">
                                @csrf
                                <input type="hidden" name="bill_id" value="{{$bill->id}}">
                                <button class="btn btn-info btn-sm">
                                    Berikan Tagihan kepada Semua {{ env('TEXT_STUDENT', 'Santri') }}
                                </button>
                            </form>
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
                                            <th>Kelas</th>
                                            <th>Tambahkan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($santris as $santri)
                                            <tr>
                                                <td>{{$santri->Santri->nis}}</td>
                                                <td>{{$santri->Santri->name}}</td>
                                                <td>{{$santri->Santri->birthplace}}, {{$santri->Santri->birthdate}}</td>
                                                <td>
                                                    @isset($santri->Santri->class_id)
                                                        {{ $santri->Santri->Classes->name }}
                                                        @else
                                                        -
                                                    @endisset    
                                                </td>
                                                <td>
                                                    <form action="{{route('financeadmin.billTransaction.store')}}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="bill_id" value="{{$bill->id}}">
                                                        <input type="hidden" name="santri_id" value="{{$santri->Santri->id}}">
                                                        <button class="btn btn-primary" data-toggle="tooltip" data-placement="bottom">
                                                            Pilih {{ env('TEXT_STUDENT', 'Santri') }}
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
@endpush