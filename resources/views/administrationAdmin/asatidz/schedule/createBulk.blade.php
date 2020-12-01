@extends('layouts.app')
@push('css')
    <link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Jadwal {{ env('TEXT_TEACHER', 'Asatidz') }}</h6>
            </div>
            <div class="card-body">
                <form action="{{route('administrationadmin.asatidzschedule.storeBulk')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-3 offset-md-9 text-right">
                            <div class="form-group">
                                <button type="button" class="btn btn-sm btn-info" onclick="selectAll()">Pilih semua {{ env('TEXT_TEACHER', 'Asatidz') }}</button>
                            </div>
                        </div>
                        <div class="col-md-12 mt-3">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Foto</th>
                                            <th>NIP</th>
                                            <th>Nama</th>
                                            <th>Telepon</th>
                                            <th>Pilih</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($asatidzs as $asatidz)
                                            <tr>
                                                <td><img src="{{asset('storage/'.$asatidz->photo)}}" alt="asatidz photo" style="height: 100px"></td>
                                                <td>{{$asatidz->nip}}</td>
                                                <td>{{$asatidz->name}}</td>
                                                <td>{{$asatidz->phone}}</td>
                                                <td>
                                                    <input type="checkbox" name="asatidzs[]" id="asatidz_id" value="{{$asatidz->id}}" class="form-control check">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-left">
                        <label for="name">Nama Kegiatan</label>
                        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
                        @include('layouts.inputError', ['errorName' => 'name'])
                    </div>
                    <div class="form-group text-left">
                        <label for="day">Hari</label>
                        <select id="day" name="day" class="form-control @error('day') is-invalid @enderror" value="{{old('day')}}">
                            <option value="" disabled selected>Pilih Hari Kegiatan</option>
                            <option value="everyday">Setiap Hari</option>
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
                        <input name="start_time" type="time" class="form-control @error('start_time') is-invalid @enderror" value="{{old('start_time')}}">
                        @include('layouts.inputError', ['errorName' => 'start_time'])
                    </div>
                    <div class="form-group text-left">
                        <label for="end_time">Waktu Akhir</label>
                        <input name="end_time" type="time" class="form-control @error('end_time') is-invalid @enderror" value="{{old('end_time')}}">
                        @include('layouts.inputError', ['errorName' => 'end_time'])
                    </div>
                    <div class="form-group text-left">
                        <label for="status">Status Jadwal</label>
                        <select id="status" name="status" class="form-control @error('status') is-invalid @enderror" value="{{old('status')}}">
                            <option value="" disabled selected>Pilih Status Jadwal</option>
                            <option value="publish">Berlansung</option>
                            <option value="draft">Berkas</option>
                        </select>
                        @include('layouts.inputError', ['errorName' => 'status'])
                    </div>
                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script src="{{asset('admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/js/demo/datatables-demo.js')}}"></script>

    <script>
        $(document).ready(function() {
            const statusOldValue = '{{ old('status') }}';
            
            if(statusOldValue !== '') {
                $('#status').val(statusOldValue);
            }

            const dayOldValue = '{{ old('day') }}';
            
            if(dayOldValue !== '') {
                $('#day').val(dayOldValue);
            }

            $(function () {
              $('[data-toggle="tooltip"]').tooltip()
            })
        });

        function selectAll() {
            $('.check').attr('checked', true);
        }
    </script>
@endpush