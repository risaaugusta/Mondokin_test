@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Mata Pelajaran</h6>
            </div>
            <div class="card-body">
                <form action="{{route('administrationadmin.subject.store')}}" method="post">
                    @csrf
                    <input type="hidden" name="pesantren_id" value="{{Auth::user()->pesantren_id}}">
                    <div class="form-group text-left">
                        <label for="code">Kode Mata Pelajaran</label>
                        <input name="code" type="text" class="form-control @error('code') is-invalid @enderror" value="{{old('code')}}" required>
                        @include('layouts.inputError', ['errorName' => 'code'])
                    </div>
                    <div class="form-group text-left">
                        <label for="name">Nama Mata Pelajaran</label>
                        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" required>
                        @include('layouts.inputError', ['errorName' => 'name'])
                    </div>
                    <div class="form-group text-left">
                        <label for="grade">Kelas</label>
                        <select id="grade" name="grade" class="form-control @error('grade') is-invalid @enderror" value="{{old('grade')}}" required>
                            <option value="" disabled selected>Pilih Kelas</option>
                            @for ($i = 1; $i <= 12; $i++)
                                <option value={{$i}}>{{$i}}</option>
                            @endfor
                        </select>
                        @include('layouts.inputError', ['errorName' => 'grade'])
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
            const gradeOldValue = '{{ old('grade') }}';
            
            if(gradeOldValue !== '') {
                $('#grade').val(gradeOldValue);
            }
        });
    </script>
@endpush