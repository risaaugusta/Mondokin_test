@extends('layouts.app')

@push('css')
    <link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Raport</h6>
                </div>
                <div class="card-body">
                    @include('layouts.alert')
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>NIS</th>
                                            <th>Nama</th>
                                            <th>Kelas</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($santris as $santri)
                                            <tr>
                                                <td>{{$santri->Santri->nis}}</td>
                                                <td>{{$santri->Santri->name}}</td>
                                                <td>
                                                    @isset($santri->Santri->class_id)
                                                        {{ $santri->Santri->Classes->name }}
                                                        @else
                                                        -
                                                    @endisset    
                                                </td>
                                                <td>
                                                    <button class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" onclick="selectSantri({{$santri}})">
                                                        Pilih {{ env('TEXT_STUDENT', 'Santri') }}
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Isi Raport</h6>
                </div>
                <div class="card-body">
                    @include('layouts.alert')
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <form action="{{route('administrationadmin.report.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input id="santri_id" type="hidden" name="santri_id" value="">
                                <div class="form-group">
                                    <label for="">Nama Santri</label>
                                    <input id="santri_name" type="text" class="form-control" value="" disabled>
                                </div>
                                <div class="form-group text-left">
                                    <label for="year">Tahun</label>
                                    <input name="year" type="year" class="form-control @error('year') is-invalid @enderror" value="{{old('year')}}" required>
                                    @include('layouts.inputError', ['errorName' => 'year'])
                                </div>
                                <div class="form-group text-left">
                                    <label for="semester">Semester</label>
                                    <select id="semester" name="semester" class="form-control @error('semester') is-invalid @enderror" value="{{old('semester')}}" required>
                                        <option value="" disabled selected>Pilih Semester</option>
                                        <option value="1">Semester 1 (Ganjil)</option>
                                        <option value="2">Semester 2 (Genap)</option>
                                    </select>
                                    @include('layouts.inputError', ['errorName' => 'semester'])
                                </div>
                                <div class="form-group text-left">
                                    <label for="category">Jenis Raport</label>
                                    <select id="category" name="category" class="form-control @error('category') is-invalid @enderror" value="{{old('category')}}" required>
                                        <option value="" disabled selected>Pilih Jenis Raport</option>
                                        <option value="academic">Akademik</option>
                                        <option value="tahfidz">Tahfidz</option>
                                    </select>
                                    @include('layouts.inputError', ['errorName' => 'category'])
                                </div>
                                <div class="form-group text-left">
                                    <label for="file">File Raport</label>
                                    <input name="file" type="file" class="form-control @error('file') is-invalid @enderror" value="{{old('file')}}" required>
                                    @include('layouts.inputError', ['errorName' => 'file'])
                                </div>
                                <button class="btn btn-primary">Tambahkan</button>
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
            const semesterOldValue = '{{ old('semester') }}';
            
            if(semesterOldValue !== '') {
                $('#semester').val(semesterOldValue);
            }

            const categoryOldValue = '{{ old('category') }}';
            
            if(categoryOldValue !== '') {
                $('#category').val(categoryOldValue);
            }
        });

        function selectSantri({santri}) {
            $('#santri_id').val(santri.id)
            $('#santri_name').val(santri.name)
        }
    </script>
@endpush