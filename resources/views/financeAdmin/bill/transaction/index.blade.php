@extends('layouts.app')

@push('css')
    <link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Semua Tagihan</h6>
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
                                            <th>Kode</th>
                                            <th>Tagihan</th>
                                            <th>{{ env('TEXT_STUDENT', 'Santri') }}</th>
                                            <th>Jumlah</th>
                                            <th>Tanggal Pembayaran</th>
                                            <th>Status</th>
                                            <th>Invoice</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bills as $bill)
                                            <tr>
                                                <td>{{$bill->id}}</td>
                                                <td>{{$bill->Bill->code}}</td>
                                                <td>{{$bill->Bill->name}}</td>
                                                <td>{{$bill->Santri->name}} ({{$bill->Santri->nis}})</td>
                                                <td>Rp. {{number_format($bill->Bill->amount)}}</td>
                                                <td>{{$bill->pay_date}}</td>
                                                <td>
                                                    @switch($bill->status)
                                                        @case('unpaid')
                                                            <span class="badge badge-danger">Belum Bayar</span>
                                                            @break
                                                        @case('paid')
                                                            <span class="badge badge-primary">Menunggu Konfirmasi</span>
                                                            @break
                                                        @default
                                                            <span class="badge badge-info">Sudah Bayar</span>
                                                    @endswitch
                                                </td>
                                                <td>
                                                    <a href="{{route('financeadmin.billTransaction.invoice', $bill->id)}}" class="btn btn-info" data-toggle="tooltip" data-placement="bottom" title="Lihat Invoice">
                                                        <i class="fas fa-fw fa-receipt"></i>
                                                    </a>
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