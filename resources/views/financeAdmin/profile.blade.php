@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Profile</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            @include('layouts.alert')
                            <form action="{{route('financeadmin.profile.update')}}" method="post">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" value={{ Auth::id() }}>
                                <div class="form-group text-left">
                                    <label for="username">Username</label>
                                    <input name="username" type="text" class="form-control @error('username') is-invalid @enderror" value="{{old('username') ?: Auth::user()->username}}">
                                    @include('layouts.inputError', ['errorName' => 'username'])
                                </div>
                                <div class="form-group text-left">
                                    <label for="email">Email</label>
                                    <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email') ?: Auth::user()->email}}">
                                    @include('layouts.inputError', ['errorName' => 'email'])
                                </div>
                                <div class="form-group text-left">
                                    <label for="password">Password</label>
                                    <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" value="{{old('password')}}">
                                    @include('layouts.inputError', ['errorName' => 'password'])
                                </div>
                                <div class="form-group text-left">
                                    <label for="password_confirmation">Konfirmasi Password</label>
                                    <input name="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" value="{{old('password_confirmation')}}">
                                    @include('layouts.inputError', ['errorName' => 'password_confirmation'])
                                </div>
                                <button type="submit" class="btn btn-warning">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection