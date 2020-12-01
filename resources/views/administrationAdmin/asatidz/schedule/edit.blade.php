@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Ubah Jadwal {{ env('TEXT_TEACHER', 'Asatidz') }} {{$schedule->Asatidz->name}}</h6>
            </div>
            <div class="card-body">
                <form action="{{route('administrationadmin.asatidzschedule.update', $schedule->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="asatidz_id" value="{{$schedule->asatidz_id}}">
                    <div class="form-group text-left">
                        <label for="name">Nama Kegiatan</label>
                        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{old('name') ?: $schedule->name}}">
                        @include('layouts.inputError', ['errorName' => 'name'])
                    </div>
                    <div class="form-group text-left">
                        <label for="day">Hari</label>
                        <select id="day" name="day" class="form-control @error('day') is-invalid @enderror" value="{{old('day') ?: $schedule->day}}">
                            <option value="" disabled selected>Pilih Hari Kegiatan</option>
                            <option value="sunday">Minggu</option>
                            <option value="monday">Senin</option>
                            <option value="tuesday">Selasa</option>
                            <option value="wednesday">Rabu</option>
                            <option value="thursday">Kamis</option>
                            <option value="friday">Jumat</option>
                            <option value="saturday">Sabtu</option>
                        </select>
                        @include('layouts.inputError', ['errorName' => 'day'])
                    </div>
                    <div class="form-group text-left">
                        <label for="start_time">Waktu Awal</label>
                        <input name="start_time" type="time" class="form-control @error('start_time') is-invalid @enderror" value="{{old('start_time') ?: $schedule->start_time}}">
                        @include('layouts.inputError', ['errorName' => 'start_time'])
                    </div>
                    <div class="form-group text-left">
                        <label for="end_time">Waktu Akhir</label>
                        <input name="end_time" type="time" class="form-control @error('end_time') is-invalid @enderror" value="{{old('end_time') ?: $schedule->end_time}}">
                        @include('layouts.inputError', ['errorName' => 'end_time'])
                    </div>
                    <div class="form-group text-left">
                        <label for="status">Status Jadwal</label>
                        <select id="status" name="status" class="form-control @error('status') is-invalid @enderror" value="{{old('status') ?: $schedule->status}}">
                            <option value="" disabled selected>Pilih Status Jadwal</option>
                            <option value="publish">Berlansung</option>
                            <option value="draft">Berkas</option>
                        </select>
                        @include('layouts.inputError', ['errorName' => 'status'])
                    </div>
                    <button type="submit" class="btn btn-warning">Ubah</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            const statusOldValue = '{{ old('status') ?: $schedule->status }}';
            
            if(statusOldValue !== '') {
                $('#status').val(statusOldValue);
            }

            const dayOldValue = '{{ old('day') ?: $schedule->day }}';
            
            if(dayOldValue !== '') {
                $('#day').val(dayOldValue);
            }
        });
    </script>
@endpush