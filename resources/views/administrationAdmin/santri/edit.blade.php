@extends('layouts.app')

@section('content')
    <h5>Ubah Data {{ env('TEXT_STUDENT', 'Santri') }}</h5>
    <form action="{{route('administrationadmin.santri.update', $santri->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="hidden" name="user_id" value="{{$santri->User->id}}">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Akun {{ env('TEXT_STUDENT', 'Santri') }}</h6>
                    </div>
                    <div class="card-body">
                        @include('layouts.alert')
                        <input type="hidden" name="pesantren_id" value="{{Auth::user()->pesantren_id}}">
                        <div class="form-group">
                            <label for="">Username</label>
                            <input name="username" type="text" class="form-control" value="{{ old('username') ?: $santri->User->username }}" required>
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input name="email" type="email" class="form-control" value="{{ old('email') ?: $santri->User->email }}" required>
                        </div>
                        {{-- <div class="form-group">
                            <label for="">Password</label>
                            <input name="password" type="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Konfirmasi Password</label>
                            <input name="password_confirmation" type="password" class="form-control">
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Biodata {{ env('TEXT_STUDENT', 'Santri') }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">NIS</label>
                            <input name="nis" type="text" class="form-control" value="{{ old('nis') ?: $santri->nis }}" required>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Lengkap</label>
                            <input name="name" type="text" class="form-control" value="{{ old('name') ?: $santri->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="">Jenis Kelamin</label>
                            <select name="gender" id="gender" class="form-control" required>
                                <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                <option value="male">Laki-laki</option>
                                <option value="female">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Tempat Lahir</label>
                            <input name="birthplace" type="text" class="form-control" value="{{ old('birthplace') ?: $santri->birthplace }}" required>
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Lahir</label>
                            <input name="birthdate" type="date" class="form-control" value="{{ old('birthdate') ?: $santri->birthdate }}" required>
                        </div>
                        <div class="form-group">
                            <label for="">Agama</label>
                            <select name="religion" id="religion" class="form-control" required>
                                <option value="" disabled selected>Pilih Agama</option>
                                <option value="islam">Islam</option>
                                <option value="christian">Kristen</option>
                                <option value="catholic">Katolik</option>
                                <option value="hindu">Hindu</option>
                                <option value="buddha">Budha</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Kode Pos</label>
                            <input name="postal" type="text" class="form-control" value="{{ old('postal') ?: $santri->postal }}" required>
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <textarea name="address" id="" cols="" rows="" class="form-control">{{ old('address') ?: $santri->address }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Jenis Tinggal</label>
                            <select name="live_status" id="live_status" class="form-control" required>
                                <option value="" disabled selected>Pilih Jenis Tinggal</option>
                                <option value="dormitory">Asrama</option>
                                <option value="round-trip">Pulang Pergi</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Telepon</label>
                            <input name="phone" type="text" class="form-control" value="{{ old('phone') ?: $santri->phone }}" required>
                        </div>
                        <div class="form-group">
                            <label for="">Foto</label>
                            <input name="photo" type="file" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-warning mb-4">Simpan</button>
    </form>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            const religionOldValue = '{{ old('religion') ?: $santri->religion }}';
            
            if(religionOldValue !== '') {
                $('#religion').val(religionOldValue);
            }

            const genderOldValue = '{{ old('gender') ?: $santri->gender }}';
            
            if(genderOldValue !== '') {
                $('#gender').val(genderOldValue);
            }

            const live_statusOldValue = '{{ old('live_status') ?: $santri->live_status }}';
            
            if(genderOldValue !== '') {
                $('#live_status').val(live_statusOldValue);
            }
        });
    </script>
@endpush