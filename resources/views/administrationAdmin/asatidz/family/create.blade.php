@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Keluarga {{ env('TEXT_TEACHER', 'Asatidz') }} {{$asatidz->name}}</h6>
            </div>
            <div class="card-body">
                <form action="{{route('administrationadmin.asatidzfamily.store')}}" method="post">
                    @csrf
                    <input type="hidden" name="user_id" value="{{$asatidz->user_id}}">
                    <div class="form-group text-left">
                        <label for="name">Nama Lengkap</label>
                        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
                        @include('layouts.inputError', ['errorName' => 'name'])
                    </div>
                    <div class="form-group text-left">
                        <label for="status">Status Keluarga</label>
                        <select id="status" name="status" class="form-control @error('status') is-invalid @enderror" value="{{old('status')}}">
                            <option value="" disabled selected>Pilih Status Keluarga</option>
                            <option value="father">Ayah</option>
                            <option value="mother">Ibu</option>
                            <option value="husband">Suami</option>
                            <option value="wife">Istri</option>
                            <option value="child">Anak</option>
                            <option value="delegate">Wali</option>
                        </select>
                        @include('layouts.inputError', ['errorName' => 'status'])
                    </div>
                    <div class="form-group text-left">
                        <label for="nik">NIK</label>
                        <input name="nik" type="text" class="form-control @error('nik') is-invalid @enderror" value="{{old('nik')}}">
                        @include('layouts.inputError', ['errorName' => 'nik'])
                    </div>
                    <div class="form-group text-left">
                        <label for="educational">Pendidikan Terakhir</label>
                        <select id="educational" name="educational" class="form-control @error('educational') is-invalid @enderror" value="{{old('educational')}}">
                            <option value="" disabled selected>Pilih Pendidikan Terakhir</option>
                            <option value="-">Tidak Sekolah</option>
                            <option value="SD">SD</option>
                            <option value="SMP">SMP</option>
                            <option value="SMA">SMA/SMK</option>
                            <option value="Sarjana">Sarjana</option>
                        </select>
                        @include('layouts.inputError', ['errorName' => 'educational'])
                    </div>
                    <div class="form-group text-left">
                        <label for="birthplace">Tempat Lahir</label>
                        <input name="birthplace" type="text" class="form-control @error('birthplace') is-invalid @enderror" value="{{old('birthplace')}}">
                        @include('layouts.inputError', ['errorName' => 'birthplace'])
                    </div>
                    <div class="form-group text-left">
                        <label for="birthdate">Tangal Lahir</label>
                        <input name="birthdate" type="date" class="form-control @error('birthdate') is-invalid @enderror" value="{{old('birthdate')}}">
                        @include('layouts.inputError', ['errorName' => 'birthdate'])
                    </div>
                    <div class="form-group text-left">
                        <label for="occupation">Pekerjaan</label>
                        <input name="occupation" type="text" class="form-control @error('occupation') is-invalid @enderror" value="{{old('occupation')}}">
                        @include('layouts.inputError', ['errorName' => 'occupation'])
                    </div>
                    <div class="form-group text-left">
                        <label for="income">Pendapatan</label>
                        <input name="income" type="number" class="form-control @error('income') is-invalid @enderror" value="{{old('income') ?: 0}}" min="0">
                        @include('layouts.inputError', ['errorName' => 'income'])
                    </div>
                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            const statusOldValue = '{{ old('status') }}';
            
            if(statusOldValue !== '') {
                $('#status').val(statusOldValue);
            }

            const educationalOldValue = '{{ old('educational') }}';
            
            if(educationalOldValue !== '') {
                $('#educational').val(educationalOldValue);
            }
        });
    </script>
@endpush