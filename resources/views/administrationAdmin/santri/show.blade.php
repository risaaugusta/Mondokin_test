@extends('layouts.app')

@push('css')
    <link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Profile {{ env('TEXT_STUDENT', 'Santri') }}</h6>
                </div>
                <div class="card-body">
                    @include('layouts.alert')
                    <div class="row">
                        <div class="col-md-3">
                            @isset($santri->photo)
                                <img src="{{asset('storage/'.$santri->photo)}}" alt="logo" class="img-fluid">
                                @else
                                <p>Tidak ada foto</p>
                            @endisset
                        </div>
                        <div class="col-md-9">
                            <h3>
                                {{$santri->name}}
                            </h3>
                            <table class="table">
                                <tr>
                                    <th colspan="2">Informasi Akun</th>
                                </tr>
                                <tr>
                                    <th>Username</th>
                                    <td>{{$santri->User->username}}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{$santri->User->email}}</td>
                                </tr>
                                <tr>
                                    <th colspan="2">
                                        <br><br>
                                        Informasi santri
                                    </th>
                                </tr>
                                <tr>
                                    <th>NIS</th>
                                    <td>{{$santri->nis}}</td>
                                </tr>
                                <tr>
                                    <th>TTL</th>
                                    <td>{{$santri->birthplace}}, {{$santri->birthdate}}</td>
                                </tr>
                                <tr>
                                    <th>Jenis Kelamin</th>
                                    <td>{{$santri->gender == 'male' ? 'Laki-laki' : 'Perempuan'}}</td>
                                </tr>
                                <tr>
                                    <th>Agama</th>
                                    <td>{{$santri->religion}}</td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td>{{$santri->address}}</td>
                                </tr>
                                <tr>
                                    <th>Telepon</th>
                                    <td>{{$santri->phone}}</td>
                                </tr>
                                <tr>
                                    <th>Jenis {{ env('TEXT_SCHOOL', 'Pesantren') }}</th>
                                    <td>{{ $santri->PesantrenType ? $santri->PesantrenType->name : '' }}</td>
                                </tr>
                                <tr>
                                    <th>Jenis Jenjang</th>
                                    <td>{{ $santri->Classess ? $santri->Classes->name : '' }}</td>
                                </tr>
                                <tr>
                                    <th>Jumlah Saldo</th>
                                    <td>Rp. {{number_format($santri->balance)}}</td>
                                </tr>
                            </table>      
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('administrationAdmin.santri.family')
    <a href="{{route('administrationadmin.santri.index')}}" class="btn btn-primary mb-3">
        Kembali
    </a>
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