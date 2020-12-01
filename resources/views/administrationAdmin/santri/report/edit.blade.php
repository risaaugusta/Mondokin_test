@extends('layouts.app')

@push('css')
    <link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Ubah Raport</h6>
                </div>
                <div class="card-body">
                    @include('layouts.alert')
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <form action="{{route('administrationadmin.report.update', $report->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input id="santri_id" type="hidden" name="santri_id" value="{{$report->santri_id}}">
                                <div class="form-group">
                                    <label for="">Nama {{ env('TEXT_STUDENT', 'Santri') }}</label>
                                    <input id="santri_name" type="text" class="form-control" value="{{$report->Santri->name}}" disabled>
                                </div>
                                <div class="form-group text-left">
                                    <label for="year">Tahun</label>
                                    <input name="year" type="year" class="form-control @error('year') is-invalid @enderror" value="{{old('year') ?: $report->year}}" required>
                                    @include('layouts.inputError', ['errorName' => 'year'])
                                </div>
                                <div class="form-group text-left">
                                    <label for="semester">Semester</label>
                                    <select id="semester" name="semester" class="form-control @error('semester') is-invalid @enderror" value="{{old('semester') ?: $report->semester}}" required>
                                        <option value="" disabled selected>Pilih Semester</option>
                                        <option value="1">Semester 1 (Ganjil)</option>
                                        <option value="2">Semester 2 (Genap)</option>
                                    </select>
                                    @include('layouts.inputError', ['errorName' => 'semester'])
                                </div>
                                <div class="form-group text-left">
                                    <label for="category">Jenis Raport</label>
                                    <select id="category" name="category" class="form-control @error('category') is-invalid @enderror" value="{{old('category') ?: $report->category}}" required>
                                        <option value="" disabled selected>Pilih Jenis Raport</option>
                                        <option value="academic">Akademik</option>
                                        <option value="tahfidz">Tahfidz</option>
                                    </select>
                                    @include('layouts.inputError', ['errorName' => 'category'])
                                </div>
                                <div class="form-group text-left">
                                    <label for="file">File Raport</label>
                                    <input name="file" type="file" class="form-control @error('file') is-invalid @enderror" value="{{old('file')}}">
                                    @include('layouts.inputError', ['errorName' => 'file'])
                                </div>
                                <button class="btn btn-warning">Ubah</button>
                            </form>
                        </div>
                    </div>
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
            const semesterOldValue = '{{ old('semester') ?: $report->semester }}';
            
            if(semesterOldValue !== '') {
                $('#semester').val(semesterOldValue);
            }

            const categoryOldValue = '{{ old('category') ?: $report->category }}';
            
            if(categoryOldValue !== '') {
                $('#category').val(categoryOldValue);
            }
        });
    </script>
@endpush