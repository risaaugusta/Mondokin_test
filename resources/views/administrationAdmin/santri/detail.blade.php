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
                                    <p>Belum ada foto</p>
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
                                    <th>Email</th>
                                    <td>{{$santri->User->email}}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Daftar</th>
                                    <td>{{$santri->User->created_at->format('d-m-Y')}}</td>
                                </tr>
                                <tr>
                                    <th colspan="2">
                                        <br>
                                        <br>
                                        Informasi Santri
                                    </th>
                                </tr>
                                <tr>
                                    <th>Jenis Kelamin</th>
                                    <td>
                                        @switch($santri->gender)
                                            @case('male')
                                                Laki-laki
                                                @break
                                            @case('female')
                                                Perempuan
                                                @break
                                        @endswitch
                                    </td>
                                </tr>
                                <tr>
                                    <th>Tempat Tanggal Lahir</th>
                                    <td>{{$santri->birthplace}}, {{$santri->birthdate}}</td>
                                </tr>
                                <tr>
                                    <th>Agama</th>
                                    <td>{{$santri->religion}}</td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td>{{$santri->address}} ({{$santri->postal}})</td>
                                </tr>
                                <tr>
                                    <th>Telepon</th>
                                    <td>{{$santri->phone}}</td>
                                </tr>
                                <tr>
                                    <th>Jenis {{ env('TEXT_SCHOOL', 'Pesantren') }}</th>
                                    <td>{{ $santri->PesantrenType->name }}</td>
                                </tr>
                                <tr>
                                    <th>Jenis Jenjang</th>
                                    <td>{{ $santri->Classes->name }}</td>
                                </tr>
                            </table>      
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
                    <h6 class="m-0 font-weight-bold text-primary">Verifikasi {{ env('TEXT_STUDENT', 'Santri') }} Baru</h6>
                </div>
                <div class="card-body">
                    @include('layouts.alert')
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{route('administrationadmin.santri.verification.verify')}}" method="post">
                                @csrf
                                <input type="hidden" name="santri_id" value="{{$santri->id}}">
                                <div class="form-group">
                                    <label for="nis">NIS</label>
                                    <input name="nis" type="number" class="form-control @error('nis') is-invalid @enderror" value="{{old('nis')}}" required>
                                    @include('layouts.inputError', ['errorName' => 'nis'])
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input name="username" type="text" class="form-control @error('username') is-invalid @enderror" value="{{old('username')}}" required>
                                    @include('layouts.inputError', ['errorName' => 'username'])
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" required>
                                    @include('layouts.inputError', ['errorName' => 'password'])
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation">Konfirmasi Password</label>
                                    <input name="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" required>
                                    @include('layouts.inputError', ['errorName' => 'password_confirmation'])
                                </div>
                                <button type="submit" class="btn btn-primary">Verifikasi</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="{{route('administrationadmin.santri.verification')}}" class="btn btn-warning mb-3">
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