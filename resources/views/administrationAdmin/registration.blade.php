@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Info {{ env('TEXT_SCHOOL', 'Pesantren') }}</h6>
                </div>
                <div class="card-body">
                    @include('layouts.alert')
                    @if (Auth::user()->Pesantren->online_registration)
                        <div class="alert alert-info">
                            Pendaftaran Online Sedang <span class="badge badge-info">DIBUKA</span>
                            <br>
                            <b>Harap Isi Data Tipe {{ env('TEXT_SCHOOL', 'Pesantren') }} Terlebih Dahulu</b>
                        </div>
                    @else
                        <div class="alert alert-warning">
                            Pendaftaran Online Sedang <span class="badge badge-warning">DITUTUP</span>
                        </div>
                    @endif
                    <form action="{{ route('administrationadmin.registration.update', $registration->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group text-left">
                            <label for="online_registration">Status Pendaftaran</label>
                            <select id="online_registration" name="online_registration" class="form-control @error('online_registration') is-invalid @enderror" value="{{old('online_registration')}}">
                                <option value="" disabled selected>Pilih Status Pendaftaran</option>
                                <option value="1">Buka</option>
                                <option value="0">Tutup</option>
                            </select>
                            @include('layouts.inputError', ['errorName' => 'online_registration'])
                        </div>
                        <div class="form-group">
                            <label for="description">Deskripsi</label>
                            <textarea id="editor" name="description">{{$registration->description}}</textarea>
                            @include('layouts.inputError', ['errorName' => 'description'])
                        </div>
                        <div class="form-group">
                            <label for="requirement">Lampiran / Syarat</label>
                            <textarea id="editor2" name="requirement">{{$registration->requirement}}</textarea>
                            @include('layouts.inputError', ['errorName' => 'requirement'])
                        </div>
                        <div class="form-group">
                            <label for="offline_document">Dokumen Offline</label>
                            <input name="offline_document" type="file" class="form-control @error('offline_document') is-invalid @enderror" value="{{old('offline_document')}}">
                            @include('layouts.inputError', ['errorName' => 'offline_document'])
                        </div>
                        <button class="btn btn-warning">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/18.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
        ClassicEditor
        .create( document.querySelector( '#editor2' ) )
        .catch( error => {
            console.error( error );
        } );

        $(document).ready(function() {
            const online_registrationOldValue = '{{ old('online_registration') ?: Auth::user()->Pesantren->online_registration }}';
            
            if(online_registrationOldValue !== '') {
                $('#online_registration').val(online_registrationOldValue);
            }
        });
    </script>
@endpush