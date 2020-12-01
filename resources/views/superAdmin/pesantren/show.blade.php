@extends('layouts.app')

@push('css')
    <link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Detail Institusi</h6>
                </div>
                <div class="card-body">
                    @include('layouts.alert')
                    <div class="row">
                        <div class="col-md-3">
                            <img src="{{asset('storage/'.$pesantren->photo)}}" alt="logo" class="img-fluid">
                        </div>
                        <div class="col-md-9">
                            <h3 class="@if($pesantren->suspended) text-danger @endif">
                                {{$pesantren->name}}
                                @if ($pesantren->suspended)
                                    <span class="badge badge-danger">SUSPENDED</span>
                                @endif
                            </h3>
                            <table class="table">
                                <tr>
                                    <th>Nomor Induk</th>
                                    <td>{{$pesantren->registration_number}}</td>
                                </tr>
                                <tr>
                                    <th>Akreditasi</th>
                                    <td>{{$pesantren->accreditation ?: 'Belum Terakreditasi'}}</td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td>{{$pesantren->address}}</td>
                                </tr>
                                <tr>
                                    <th>Kota/Kabupaten</th>
                                    <td>{{$pesantren->Regency->name}}</td>
                                </tr>
                                <tr>
                                    <th>Provinsi</th>
                                    <td>{{$pesantren->Province->name}}</td>
                                </tr>
                                <tr>
                                    <th>Telepon</th>
                                    <td>{{$pesantren->phone}}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{$pesantren->email}}</td>
                                </tr>
                                <tr>
                                    <th>Website</th>
                                    <td>{{$pesantren->website}}</td>
                                </tr>
                                <tr>
                                    <th>Sosial Media</th>
                                    <td>
                                        <ul>
                                            <li>Facebook: {{$pesantren->facebook}}</li>
                                            <li>Instagram: {{$pesantren->instagram}}</li>
                                            <li>Youtube: {{$pesantren->youtube}}</li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Tanggal Bergabung</th>
                                    <td>{{$pesantren->created_at->format('D, d-m-Y')}}</td>
                                </tr>
                            </table>      
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('superAdmin.pesantren.account.create')
    <a href="{{route('superadmin.pesantren.index')}}" class="btn btn-primary mb-3">
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
    </script>
@endpush