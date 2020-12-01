@extends('layouts.app')

@push('css')
    <link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Profile {{ env('TEXT_TEACHER', 'Asatidz') }}</h6>
                </div>
                <div class="card-body">
                    @include('layouts.alert')
                    <div class="row">
                        <div class="col-md-3">
                            <img src="{{asset('storage/'.$asatidz->Asatidz->photo)}}" alt="logo" class="img-fluid">
                        </div>
                        <div class="col-md-9">
                            <h3>
                                {{$asatidz->Asatidz->name}}
                            </h3>
                            <table class="table">
                                <tr>
                                    <th colspan="2">Informasi Akun</th>
                                </tr>
                                <tr>
                                    <th>Username</th>
                                    <td>{{$asatidz->username}}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{$asatidz->email}}</td>
                                </tr>
                                <tr>
                                    <th colspan="2">Informasi Asatidz</th>
                                </tr>
                                <tr>
                                    <th>NIP</th>
                                    <td>{{$asatidz->Asatidz->nip}}</td>
                                </tr>
                                <tr>
                                    <th>KTP</th>
                                    <td>{{$asatidz->Asatidz->ktp}}</td>
                                </tr>
                                <tr>
                                    <th>NPWP</th>
                                    <td>{{$asatidz->Asatidz->npwp}}</td>
                                </tr>
                                <tr>
                                    <th>Agama</th>
                                    <td>{{$asatidz->Asatidz->religion}}</td>
                                </tr>
                                <tr>
                                    <th>Jenis Kelamin</th>
                                    <td>{{$asatidz->Asatidz->gender == 'male' ? 'Laki-laki' : 'Perempuan'}}</td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td>{{$asatidz->Asatidz->address}}</td>
                                </tr>
                                <tr>
                                    <th>Telepon</th>
                                    <td>{{$asatidz->Asatidz->phone}}</td>
                                </tr>
                                <tr>
                                    <th>Tempat Tanggal Lahir</th>
                                    <td>{{$asatidz->Asatidz->birthplace}}, {{$asatidz->Asatidz->birthdate}}</td>
                                </tr>
                                <tr>
                                    <th>Tugas Tambahan</th>
                                    <td>{{$asatidz->Asatidz->additional_task}}</td>
                                </tr>
                                <tr>
                                    <th>Status Perkawinan</th>
                                    <td>{{$asatidz->Asatidz->marriage_status == 'married' ? 'Menikah' : 'Belum Menikah'}}</td>
                                </tr>
                                <tr>
                                    <th>Status Karyawan</th>
                                    <td>
                                        @switch($asatidz->Asatidz->employee_status)
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
                                </tr>
                            </table>      
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('administrationAdmin.asatidz.family.index')
    @include('administrationAdmin.asatidz.schedule.index')
    <a href="{{route('administrationadmin.asatidz.index')}}" class="btn btn-primary mb-3">
        Kembali
    </a>
@endsection

@push('js')
    <script src="{{asset('admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/js/demo/datatables-demo.js')}}"></script>

    <script>
        $(document).ready(function() {
            const roleOldValue = '{{ old('role') }}';
            
            if(roleOldValue !== '') {
                $('#role').val(roleOldValue);
            }
        });
        $(function () {
          $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@endpush