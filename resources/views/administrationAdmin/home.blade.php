@extends('layouts.app', ['pageTitle' => 'Selamat Datang Administration Admin'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Absen {{ env('APP_TYPE') == 'school' ? 'Guru' : 'Asatidz' }}</h6>
                </div>
                <div class="card-body">
                    @include('layouts.alert')
                    <form action="{{route('absent.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Masukkan ID {{ env('APP_TYPE') == 'school' ? 'Guru' : 'Asatidz' }}</label>
                            <input name="asatidz_id" type="number" class="form-control">
                        </div>
                        <button class="btn btn-primary">Absen</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection