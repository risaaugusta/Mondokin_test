@extends('layouts.app')

@section('content')
    <form action="{{route('administrationadmin.santri.store')}}" method="post" enctype="multipart/form-data">
    @csrf
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
                            <input name="username" type="text" class="form-control" value="{{ old('username') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input name="email" type="email" class="form-control" value="{{ old('email') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input name="password" type="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Konfirmasi Password</label>
                            <input name="password_confirmation" type="password" class="form-control" required>
                        </div>
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
                            <input name="nis" type="text" class="form-control" value="{{ old('nis') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Lengkap</label>
                            <input name="name" type="text" class="form-control" value="{{ old('name') }}" required>
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
                            <input name="birthplace" type="text" class="form-control" value="{{ old('birthplace') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Lahir</label>
                            <input name="birthdate" type="date" class="form-control" value="{{ old('birthdate') }}" required>
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
                            <input name="postal" type="text" class="form-control" value="{{ old('postal') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <textarea name="address" id="" cols="" rows="" class="form-control">{{ old('address') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Jenis {{ env('TEXT_SCHOOL', 'Pesantren') }}</label>
                            <select name="pesantren_type_id" id="" class="form-control" required>
                                <option value="" disabled selected>Pilih Jenis {{ env('TEXT_SCHOOL', 'Pesantren') }}</option>
                                @foreach (Auth::user()->Pesantren->PesantrenType as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Pilihan Jenjang</label>
                            <select name="class_id" id="" class="form-control" required>
                                <option value="" disabled selected>Pilih Jenjang</option>
                                @foreach (Auth::user()->Pesantren->Classes as $class)
                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Telepon</label>
                            <input name="phone" type="text" class="form-control" value="{{ old('phone') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="">Foto</label>
                            <input name="photo" type="file" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mb-4">Tambahkan</button>
    </form>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            const religionOldValue = '{{ old('religion') }}';
            
            if(religionOldValue !== '') {
                $('#religion').val(religionOldValue);
            }

            const genderOldValue = '{{ old('gender') }}';
            
            if(genderOldValue !== '') {
                $('#gender').val(genderOldValue);
            }
        });
    </script>
@endpush