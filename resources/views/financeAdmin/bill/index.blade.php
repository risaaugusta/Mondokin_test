@extends('layouts.app')

@push('css')
    <link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Tagihan</h6>
                </div>
                <div class="card-body">
                    @include('layouts.alert')
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <a href="{{route('financeadmin.bill.create')}}" class="btn btn-primary">
                                Tambah Tagihan
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
                                            <th>Kode</th>
                                            <th>Nama Tagihan</th>
                                            <th>Tanggal</th>
                                            <th>Jumlah</th>
                                            <th>Catatan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bills as $bill)
                                            <tr>
                                                <td>{{$bill->id}}</td>
                                                <td>{{$bill->code}}</td>
                                                <td>{{$bill->name}}</td>
                                                <td>{{$bill->start_date}} s/d {{$bill->end_date}}</td>
                                                <td>Rp. {{number_format($bill->amount)}}</td>
                                                <td>{{$bill->notes ?: '-'}}</td>
                                                <td>
                                                    <a href="{{route('financeadmin.billTransaction.create', $bill->id)}}" class="btn btn-info" data-toggle="tooltip" data-placement="bottom" title="Berikan Tagihan ke Santri">
                                                        <i class="fas fa-fw fa-user"></i>
                                                    </a>
                                                    <a href="{{route('financeadmin.bill.edit', $bill->id)}}" class="btn btn-warning" data-toggle="tooltip" data-placement="bottom" title="Ubah Tagihan">
                                                        <i class="fas fa-fw fa-edit"></i>
                                                    </a>
                                                    <form action="{{route('financeadmin.bill.destroy', $bill->id)}}" method="post" style="display: inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Hapus Tagihan">
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