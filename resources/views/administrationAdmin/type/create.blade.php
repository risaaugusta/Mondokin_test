@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Tipe {{ env('TEXT_SCHOOL', 'Pesantren') }}</h6>
            </div>
            <div class="card-body">
                <form action="{{route('administrationadmin.pesantrentype.store')}}" method="post">
                    @csrf
                    <input type="hidden" name="pesantren_id" value="{{ Auth::user()->pesantren_id }}">
                    <div class="form-group text-left">
                        <label for="name">Nama Tipe</label>
                        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" required>
                        @include('layouts.inputError', ['errorName' => 'name'])
                    </div>
                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection