@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Ubah Jenjang</h6>
            </div>
            <div class="card-body">
                <form action="{{route('administrationadmin.class.update', $class->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="pesantren_id" value="{{Auth::user()->pesantren_id}}">
                    <div class="form-group text-left">
                        <label for="name">Nama Jenjang</label>
                        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{old('name') ?: $class->name}}" required>
                        @include('layouts.inputError', ['errorName' => 'name'])
                    </div>
                    <div class="form-group text-left">
                        <label for="grade">Tingkat</label>
                        <select id="grade" name="grade" class="form-control @error('grade') is-invalid @enderror" value="{{old('grade') ?: $class->grade}}" required>
                            <option value="" disabled selected>Pilih Tingkat</option>
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
            const gradeOldValue = '{{ old('grade') ?: $class->grade }}';
            
            if(gradeOldValue !== '') {
                $('#grade').val(gradeOldValue);
            }
        });
    </script>
@endpush