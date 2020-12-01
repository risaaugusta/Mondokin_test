@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Pengumuman</h6>
            </div>
            <div class="card-body">
                <form action="{{route('administrationadmin.announcement.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="pesantren_id" value="{{ Auth::user()->pesantren_id }}">
                    <div class="form-group text-left">
                        <label for="title">Judul Pengumuman</label>
                        <input name="title" type="text" class="form-control @error('title') is-invalid @enderror" value="{{old('title')}}" required>
                        @include('layouts.inputError', ['errorName' => 'title'])
                    </div>
                    <div class="form-group text-left">
                        <label for="description">Deskripsi</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" required>{{old('description')}}</textarea>
                        @include('layouts.inputError', ['errorName' => 'description'])
                    </div>
                    <div class="form-group text-left">
                        <label for="start_date">Tanggal Mulai Terbit</label>
                        <input name="start_date" type="date" class="form-control @error('start_date') is-invalid @enderror" value="{{old('start_date')}}" required>
                        @include('layouts.inputError', ['errorName' => 'start_date'])
                    </div>
                    <div class="form-group text-left">
                        <label for="end_date">Tanggal Selesai Terbit</label>
                        <input name="end_date" type="date" class="form-control @error('end_date') is-invalid @enderror" value="{{old('end_date')}}" required>
                        @include('layouts.inputError', ['errorName' => 'end_date'])
                    </div>
                    <div class="form-group text-left">
                        <label for="photo">Foto</label>
                        <input name="photo" type="file" class="form-control @error('photo') is-invalid @enderror">
                        @include('layouts.inputError', ['errorName' => 'photo'])
                    </div>
                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection