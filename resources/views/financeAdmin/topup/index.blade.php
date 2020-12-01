@extends('layouts.app')

@push('css')
    <link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Topup</h6>
                </div>
                <div class="card-body">
                    @include('layouts.alert')
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <a href="{{route('financeadmin.topup.create')}}" class="btn btn-primary">
                                Tambah Saldo {{ env('TEXT_STUDENT', 'Santri') }}
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
                                            <th>{{ env('TEXT_STUDENT', 'Santri') }}</th>
                                            <th>Kelas</th>
                                            <th>Nominal</th>
                                            <th>Catatan</th>
                                            <th>Bukti</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($topups as $topup)
                                            <tr>
                                                <td>{{$topup->id}}</td>
                                                <td>{{$topup->Santri->name}} ({{$topup->Santri->nis}})</td>
                                                <td>
                                                    @isset($santri->Santri->class_id)
                                                        {{ $santri->Santri->Classes->name }}
                                                        @else
                                                        -
                                                    @endisset    
                                                </td>
                                                <td>Rp. {{number_format($topup->amount)}}</td>
                                                <td>{{$topup->notes ?: '-'}}</td>
                                                <td>
                                                    @isset($topup->confirmation_photo)                                                    
                                                        <a href="{{asset('storage/'.$topup->confirmation_photo)}}" target="_blank" class="btn btn-info" data-toggle="tooltip" data-placement="bottom" title="Lihat Bukti Topup">
                                                            <i class="fas fa-fw fa-book"></i>
                                                        </a>
                                                    @endisset
                                                </td>
                                                <td>
                                                    @if (!$topup->confirmed)
                                                        <div class="row">
                                                            <form action="{{route('financeadmin.topup.confirm', $topup->id)}}" method="post">
                                                                @csrf
                                                                <button class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Konfirmasi Topup">
                                                                    <i class="fas fa-fw fa-check"></i>
                                                                </button>
                                                            </form>
                                                            <form action="{{route('financeadmin.topup.destroy', $topup->id)}}" method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Tolak Topup">
                                                                    <i class="fas fa-fw fa-trash"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    @endif
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