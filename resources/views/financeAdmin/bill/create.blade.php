@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Tagihan</h6>
            </div>
            <div class="card-body">
                <form action="{{route('financeadmin.bill.store')}}" method="post">
                    @csrf
                    <input type="hidden" name="pesantren_id" value="{{Auth::user()->pesantren_id}}">
                    <div class="form-group text-left">
                        <label for="code">Kode Tagihan</label>
                        <input name="code" type="text" class="form-control @error('code') is-invalid @enderror" value="{{old('code')}}" required>
                        @include('layouts.inputError', ['errorName' => 'code'])
                    </div>
                    <div class="form-group text-left">
                        <label for="name">Nama Tagihan</label>
                        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" required>
                        @include('layouts.inputError', ['errorName' => 'name'])
                    </div>
                    <div class="form-group text-left">
                        <label for="amount">Jumlah Tagihan</label>
                        <input name="amount" type="number" class="form-control @error('amount') is-invalid @enderror" value="{{old('amount')}}" required>
                        @include('layouts.inputError', ['errorName' => 'amount'])
                    </div>
                    <div class="form-group text-left">
                        <label for="start_date">Tanggal Mulai Tagihan</label>
                        <input name="start_date" type="date" class="form-control @error('start_date') is-invalid @enderror" value="{{old('start_date')}}" required>
                        @include('layouts.inputError', ['errorName' => 'start_date'])
                    </div>
                    <div class="form-group text-left">
                        <label for="end_date">Tanggal Jatuh Tempo Tagihan</label>
                        <input name="end_date" type="date" class="form-control @error('end_date') is-invalid @enderror" value="{{old('end_date')}}" required>
                        @include('layouts.inputError', ['errorName' => 'end_date'])
                    </div>
                    <div class="form-group text-left">
                        <label for="notes">Catatan</label>
                        <input name="notes" type="text" class="form-control @error('notes') is-invalid @enderror" value="{{old('notes')}}">
                        @include('layouts.inputError', ['errorName' => 'notes'])
                    </div>
                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection