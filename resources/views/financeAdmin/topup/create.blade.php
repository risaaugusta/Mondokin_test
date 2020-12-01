@extends('layouts.app')

@push('css')
    <link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Saldo {{ env('TEXT_STUDENT', 'Santri') }}</h6>
                </div>
                <div class="card-body">
                    @include('layouts.alert')
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>NIS</th>
                                            <th>Nama</th>
                                            <th>Kelas</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($santris as $santri)
                                            <tr>
                                                <td>{{$santri->Santri->nis}}</td>
                                                <td>{{$santri->Santri->name}}</td>
                                                <td>
                                                    @isset($santri->Santri->class_id)
                                                        {{ $santri->Santri->Classes->name }}
                                                        @else
                                                        -
                                                    @endisset    
                                                </td>
                                                <td>
                                                    <button class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" onclick="selectSantri({{$santri}})">
                                                        Pilih {{ env('TEXT_STUDENT', 'Santri') }}
                                                    </button>
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
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Isi Saldo</h6>
                </div>
                <div class="card-body">
                    @include('layouts.alert')
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <form action="{{route('financeadmin.topup.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input id="santri_id" type="hidden" name="santri_id" value="">
                                <input type="hidden" name="type" value="cash">
                                <input type="hidden" name="confirmed" value="1">
                                <div class="form-group">
                                    <label for="">Nama {{ env('TEXT_STUDENT', 'Santri') }}</label>
                                    <input id="santri_name" type="text" class="form-control" value="" disabled>
                                </div>
                                <div class="form-group text-left">
                                    <label for="amount">Jumlah</label>
                                    <input name="amount" type="number" min="1000" class="form-control @error('amount') is-invalid @enderror" value="{{old('amount')}}" required>
                                    @include('layouts.inputError', ['errorName' => 'amount'])
                                </div>
                                <div class="form-group text-left">
                                    <label for="notes">Catatan</label>
                                    <input name="notes" type="text" class="form-control @error('notes') is-invalid @enderror" value="{{old('notes')}}">
                                    @include('layouts.inputError', ['errorName' => 'notes'])
                                </div>
                                <button class="btn btn-primary">Tambahkan</button>
                            </form>
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
        function selectSantri({santri}) {
            $('#santri_id').val(santri.id)
            $('#santri_name').val(santri.name)
        }
    </script>
@endpush