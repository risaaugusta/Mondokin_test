@extends('layouts.app')

@push('css')
    <link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Ubah Tahfidz</h6>
                </div>
                <div class="card-body">
                    @include('layouts.alert')
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <form action="{{route('asatidz.tahfidz.update', $tahfidz->id)}}" method="post">
                                @csrf
                                @method('PUT')
                                <input id="santri_id" type="hidden" name="santri_id" value="{{$tahfidz->santri_id}}">
                                <input id="asatidz_id" type="hidden" name="asatidz_id" value="{{$tahfidz->asatidz_id}}">
                                <div class="form-group">
                                    <label for="">Nama Santri</label>
                                    <input id="santri_name" type="text" class="form-control" value="{{$tahfidz->Santri->name}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Asatidz</label>
                                    <input type="text" class="form-control" value="{{$tahfidz->Asatidz->name}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="">Tipe Setoran</label>
                                    <select name="type" id="type" class="form-control">
                                        <option value="" selected disabled>Pilih tipe setoran</option>
                                        <option value="Tilawah">Tilawah</option>
                                        <option value="Murajaah Pribadi">Murajaah Pribadi</option>
                                        <option value="Qiyamul Lail">Qiyamul Lail</option>
                                        <option value="Hafalan Baru">Hafalan Baru</option>
                                        <option value="Murajaah Baru">Murajaah Baru</option>
                                        <option value="Murajaah Lama">Murajaah Lama</option>
                                    </select>
                                </div>
                                <div class="form-group text-left">
                                    <label for="juz">Juz</label>
                                    <input name="juz" type="input" class="form-control @error('juz') is-invalid @enderror" value="{{old('juz') ?: $tahfidz->juz}}" required>
                                    @include('layouts.inputError', ['errorName' => 'juz'])
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="ayat_first">Ayat Mulai</label>
                                            <input name="ayat_first" type="input" class="form-control @error('ayat_first') is-invalid @enderror" value="{{old('ayat_first') ?: $tahfidz->ayat_first}}" required>
                                            @include('layouts.inputError', ['errorName' => 'ayat_first'])
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="ayat_end">Ayat Akhir</label>
                                            <input name="ayat_end" type="input" class="form-control @error('ayat_end') is-invalid @enderror" value="{{old('ayat_end') ?: $tahfidz->ayat_end}}" required>
                                            @include('layouts.inputError', ['errorName' => 'ayat_end'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="page_first">Halaman Mulai</label>
                                            <input name="page_first" type="input" class="form-control @error('page_first') is-invalid @enderror" value="{{old('page_first') ?: $tahfidz->page_first}}" required>
                                            @include('layouts.inputError', ['errorName' => 'page_first'])
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="page_end">Halaman Akhir</label>
                                            <input name="page_end" type="input" class="form-control @error('page_end') is-invalid @enderror" value="{{old('page_end') ?: $tahfidz->page_end}}" required>
                                            @include('layouts.inputError', ['errorName' => 'page_end'])
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-left">
                                    <label for="pages">Catatan</label>
                                    <textarea name="notes" id="" cols="" rows="" class="form-control @error('notes') is-invalid @enderror">{{old('notes') ?: $tahfidz->notes}}</textarea>
                                    @include('layouts.inputError', ['errorName' => 'pages'])
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
        function selectSantri({santri}) {
            $('#santri_id').val(santri.id)
            $('#santri_name').val(santri.name)
        }
        $(document).ready(function() {
            const typeOldValue = '{{ old('type') ?: $tahfidz->type }}';
            
            if(typeOldValue !== '') {
                $('#type').val(typeOldValue);
            }
        });
    </script>
@endpush