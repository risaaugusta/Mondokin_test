@extends('layouts.app')

@push('css')
    <link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar {{ env('TEXT_TEACHER', 'Asatidz') }}</h6>
                </div>
                <div class="card-body">
                    @include('layouts.alert')
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>NIP</th>
                                            <th>Nama</th>
                                            <th>TTL</th>
                                            <th>Status Karyawan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($asatidzs as $index => $asatidz)
                                            <tr>
                                                <td>{{$asatidz->nip}}</td>
                                                <td>{{$asatidz->name}}</td>
                                                <td>{{$asatidz->birthplace}}, {{$asatidz->birthdate}}</td>
                                                <td>
                                                    @switch($asatidz->employee_status)
                                                        @case('permanent')
                                                            Pegawai Permanan
                                                            @break
                                                        @case('contract')
                                                            Pegawai Kontrak
                                                            @break
                                                        @case('hononary')
                                                            Honorer
                                                            @break
                                                        @case('outsource')
                                                            Outsourcing
                                                            @break
                                                    @endswitch    
                                                </td>
                                                <td>
                                                    <button class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" onclick="selectasatidz({id: {{$asatidz->id}}, name: '{{$asatidz->name}}'})">
                                                        Pilih asatidz
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
                    <h6 class="m-0 font-weight-bold text-primary">Gaji Tahfidz</h6>
                </div>
                <div class="card-body">
                    @include('layouts.alert')
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <form action="{{route('financeadmin.salary.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input id="asatidz_id" type="hidden" name="asatidz_id">
                                <input type="hidden" name="pesantren_id" value="{{Auth::user()->pesantren_id}}">
                                <div class="form-group">
                                    <label for="">Nama asatidz</label>
                                    <input id="asatidz_name" type="text" class="form-control" value="" disabled>
                                </div>
                                <div class="form-group text-left">
                                    <label for="file">File</label>
                                    <input name="file" type="file" class="form-control @error('file') is-invalid @enderror" required>
                                    @include('layouts.inputError', ['errorName' => 'file'])
                                </div>
                                <div class="form-group text-left">
                                    <label for="amount">Amount</label>
                                    <input name="amount" type="number" class="form-control @error('amount') is-invalid @enderror" value="{{old('amount')}}" min=1 required>
                                    @include('layouts.inputError', ['errorName' => 'amount'])
                                </div>
                                <div class="form-group text-left">
                                    <label for="date">Tanggal Gaji</label>
                                    <input name="date" type="date" class="form-control @error('date') is-invalid @enderror" value="{{old('date')}}" required>
                                    @include('layouts.inputError', ['errorName' => 'date'])
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
        function selectasatidz({id, name}) {
            $('#asatidz_id').val(id)
            $('#asatidz_name').val(name)
        }
    </script>
@endpush