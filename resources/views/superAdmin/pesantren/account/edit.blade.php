@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Akun {{$admin->username}}</h6>
                </div>
                <div class="card-body">
                    @include('layouts.alert')
                    <form action="{{route('superadmin.pesantren.updateAccount', ['pesantren' => $pesantren->id, 'user' => $admin->id])}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group text-left">
                            <label for="role">Jenis Akun</label>
                            <select id="role" name="role" class="form-control @error('role') is-invalid @enderror" value="{{old('role') ?: $admin->role}}">
                                <option value="" disabled>Pilih Jenis Akun</option>
                                <option value="pesantren_admin">Admin Pesantren</option>
                                <option value="administration_admin">Admin Administrasi</option>
                                <option value="finance_admin">Admin Keuangan</option>
                                <option value="canteen_staff">Petugas Kantin</option>
                            </select>
                            @include('layouts.inputError', ['errorName' => 'role'])
                        </div>
                        <div class="form-group text-left">
                            <label for="username">Username</label>
                            <input name="username" type="text" class="form-control @error('username') is-invalid @enderror" value="{{old('username') ?: $admin->username}}">
                            @include('layouts.inputError', ['errorName' => 'username'])
                        </div>
                        <div class="form-group text-left">
                            <label for="email">Email</label>
                            <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email') ?: $admin->email}}">
                            @include('layouts.inputError', ['errorName' => 'email'])
                        </div>
                        <div class="form-group text-left">
                            <p id="password_toggle" class="text-primary" style="cursor: pointer;" onclick="changePassword()">Ganti Password</p>
                        </div>
                        <div id="password_div"></div>
                        <button type="submit" class="btn btn-warning">Ubah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            const OldValue = '{{ old('role') ?: $admin->role }}';
            
            if(OldValue !== '') {
                $('#role').val(OldValue);
            }
        });

        const changePassword = () => {
            $('#password_toggle').hide()
            $('#password_div').append(`
                <div class="form-group text-left" id="password_field">
                    <label for="password">Password</label>
                    <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" value="{{old('password')}}">
                    @include('layouts.inputError', ['errorName' => 'password'])
                </div>
            `)
            $('#password_div').append(`
                <div class="form-group text-left" id="password_confirmation_field">
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <input name="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" value="{{old('password_confirmation')}}">
                    @include('layouts.inputError', ['errorName' => 'password_confirmation'])
                </div>
            `)
        }
    </script>
@endpush