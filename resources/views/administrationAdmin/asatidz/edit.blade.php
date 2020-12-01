@extends('layouts.app')

@section('content')
    <form action="{{route('administrationadmin.asatidz.update', $asatidz->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <!-- Start Account -->
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Akun {{ env('TEXT_TEACHER', 'Asatidz') }}</h6>
                    </div>
                    <input type="hidden" name="role" value="asatidz">
                    <input type="hidden" name="pesantren_id" value="{{Auth::user()->pesantren_id}}">
                    <input type="hidden" name="id" value="{{$asatidz->id}}">
                    <input type="hidden" name="asatidz_id" value="{{$asatidz->Asatidz->id}}">
                    <div class="card-body">
                        @include('layouts.alert')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input name="username" type="text" class="form-control @error('username') is-invalid @enderror" value="{{old('username') ?: $asatidz->username}}" required>
                                    @include('layouts.inputError', ['errorName' => 'username'])
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email') ?: $asatidz->email}}" required>
                                    @include('layouts.inputError', ['errorName' => 'email'])
                                </div>
                                
                                {{-- <div class="form-group">
                                    <label for="password">Password</label>
                                    <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" value="{{old('password')}}" required>
                                    @include('layouts.inputError', ['errorName' => 'password'])
                                </div>
                                
                                <div class="form-group">
                                    <label for="password_confirmation">Konfirmasi Password</label>
                                    <input name="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" value="{{old('password_confirmation')}}" required>
                                    @include('layouts.inputError', ['errorName' => 'password_confirmation'])
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Account -->
        <!-- Start Asatidz -->
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data {{ env('TEXT_TEACHER', 'Asatidz') }}</h6>
                    </div>
                    @csrf
                    <input type="hidden" name="role" value="asatidz">
                    <input type="hidden" name="pesantren_id" value="{{Auth::user()->pesantren_id}}">
                    <div class="card-body">
                        @include('layouts.alert')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nip">NIP (Nomor Induk Pegawai)</label>
                                    <input name="nip" type="text" class="form-control @error('nip') is-invalid @enderror" value="{{old('nip') ?: $asatidz->Asatidz->nip}}" required>
                                    @include('layouts.inputError', ['errorName' => 'nip'])
                                </div>
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{old('name') ?: $asatidz->Asatidz->name}}" required>
                                    @include('layouts.inputError', ['errorName' => 'name'])
                                </div>
                                <div class="form-group">
                                    <label for="npwp">NPWP</label>
                                    <input name="npwp" type="text" class="form-control @error('npwp') is-invalid @enderror" value="{{old('npwp') ?: $asatidz->Asatidz->npwp}}" required>
                                    @include('layouts.inputError', ['errorName' => 'npwp'])
                                </div>
                                <div class="form-group">
                                    <label for="ktp">KTP</label>
                                    <input name="ktp" type="text" class="form-control @error('ktp') is-invalid @enderror" value="{{old('ktp') ?: $asatidz->Asatidz->ktp}}" required>
                                    @include('layouts.inputError', ['errorName' => 'ktp'])
                                </div>
                                <div class="form-group text-left">
                                    <label for="religion">Agama</label>
                                    <select id="religion" name="religion" class="form-control @error('religion') is-invalid @enderror" value="{{old('religion') ?: $asatidz->Asatidz->religion}}">
                                        <option value="" disabled selected>Pilih Agama</option>
                                        <option value="islam">Islam</option>
                                        <option value="christian">Kristen</option>
                                        <option value="catholic">Katolik</option>
                                        <option value="hindu">Hindu</option>
                                        <option value="buddha">Budha</option>
                                    </select>
                                    @include('layouts.inputError', ['errorName' => 'religion'])
                                </div>
                                <div class="form-group text-left">
                                    <label for="gender">Jenis Kelamin</label>
                                    <select id="gender" name="gender" class="form-control @error('gender') is-invalid @enderror" value="{{old('gender') ?: $asatidz->Asatidz->gender}}">
                                        <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                        <option value="male">Laki-laki</option>
                                        <option value="female">Perempuan</option>
                                    </select>
                                    @include('layouts.inputError', ['errorName' => 'gender'])
                                </div>
                                <div class="form-group">
                                    <label for="address">Alamat</label>
                                    <textarea name="address" id="" class="form-control @error('address') is-invalid @enderror" required>{{old('address') ?: $asatidz->Asatidz->address}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Telepon</label>
                                    <input name="phone" type="text" class="form-control @error('phone') is-invalid @enderror" value="{{old('phone') ?: $asatidz->Asatidz->phone}}" required>
                                    @include('layouts.inputError', ['errorName' => 'phone'])
                                </div>
                                <div class="form-group">
                                    <label for="birthplace">Tempat Lahir</label>
                                    <input name="birthplace" type="text" class="form-control @error('birthplace') is-invalid @enderror" value="{{old('birthplace') ?: $asatidz->Asatidz->birthplace}}" required>
                                    @include('layouts.inputError', ['errorName' => 'birthplace'])
                                </div>
                                <div class="form-group">
                                    <label for="birthdate">Tanggal Lahir</label>
                                    <input name="birthdate" type="date" class="form-control @error('birthdate') is-invalid @enderror" value="{{old('birthdate') ?: $asatidz->Asatidz->birthdate}}" required>
                                    @include('layouts.inputError', ['errorName' => 'birthdate'])
                                </div>
                                <div class="form-group">
                                    <label for="additional_task">Tugas Tambahan</label>
                                    <textarea name="additional_task" id="" class="form-control @error('additional_task') is-invalid @enderror">{{old('additional_task') ?: $asatidz->Asatidz->additional_task}}</textarea>
                                </div>
                                <div class="form-group text-left">
                                    <label for="marriage_status">Status Perkawinan</label>
                                    <select id="marriage_status" name="marriage_status" class="form-control @error('marriage_status') is-invalid @enderror" value="{{old('marriage_status') ?: $asatidz->Asatidz->marriage_status}}">
                                        <option value="" disabled selected>Pilih Status Perkawinan</option>
                                        <option value="married">Sudah Menikah</option>
                                        <option value="single">Belum Menikah</option>
                                    </select>
                                    @include('layouts.inputError', ['errorName' => 'marriage_status'])
                                </div>
                                <div class="form-group text-left">
                                    <label for="employee_status">Status Karyawan</label>
                                    <select id="employee_status" name="employee_status" class="form-control @error('employee_status') is-invalid @enderror" value="{{old('employee_status') ?: $asatidz->Asatidz->employee_status}}">
                                        <option value="" disabled selected>Pilih Status Karyawan</option>
                                        <option value="permanent">Karyawan Tetap</option>
                                        <option value="contract">Karyawan Kontrak</option>
                                        <option value="hononary">Honorer</option>
                                        <option value="outsource">Outsourcing</option>
                                    </select>
                                    @include('layouts.inputError', ['errorName' => 'employee_status'])
                                </div>
                                <div class="form-group">
                                    <label for="photo">Foto</label>
                                    <br>
                                    <img src="{{asset('storage/'.$asatidz->Asatidz->photo)}}" alt="asatidz photo" class="img-fluid">
                                    <input name="photo" type="file" class="form-control @error('photo') is-invalid @enderror" value="{{old('photo') ?: $asatidz->Asatidz->photo}}" accept="image/*">
                                    @include('layouts.inputError', ['errorName' => 'photo'])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Asatidz -->
        <button type="submit" class="btn btn-warning">
            Ubah
        </button> 
    </form>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            const religionOldValue = '{{ old('religion') ?: $asatidz->Asatidz->religion }}';
            
            if(religionOldValue !== '') {
                $('#religion').val(religionOldValue);
            }

            const genderOldValue = '{{ old('gender') ?: $asatidz->Asatidz->gender }}';
            
            if(genderOldValue !== '') {
                $('#gender').val(genderOldValue);
            }

            const marriageStatusOldValue = '{{ old('marriage_status') ?: $asatidz->Asatidz->marriage_status }}';
            
            if(marriageStatusOldValue !== '') {
                $('#marriage_status').val(marriageStatusOldValue);
            }

            const employeeStatusOldValue = '{{ old('employee_status') ?: $asatidz->Asatidz->employee_status }}';
            
            if(employeeStatusOldValue !== '') {
                $('#employee_status').val(employeeStatusOldValue);
            }
        });
    </script>
@endpush