@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Institusi</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{route('superadmin.pesantren.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Nama Institusi</label>
                                    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" required>
                                    @include('layouts.inputError', ['errorName' => 'name'])
                                </div>

                                <div class="form-group">
                                    <label for="registration_number">Nomor Induk</label>
                                    <input name="registration_number" type="text" class="form-control @error('registration_number') is-invalid @enderror" value="{{old('registration_number')}}" required>
                                    @include('layouts.inputError', ['errorName' => 'registration_number'])
                                </div>

                                <div class="form-group">
                                    <label for="accreditation">Akreditasi</label>
                                    <select id="accreditation" name="accreditation" class="form-control @error('accreditation') is-invalid @enderror" value="{{old('accreditation')}}">
                                        <option value="">Belum Terakreditasi</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                    </select>
                                    @include('layouts.inputError', ['errorName' => 'accreditation'])
                                </div>
                                
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="province_id">Provinsi</label>
                                            <select id="province" name="province_id" class="form-control @error('province_id') is-invalid @enderror" value="{{old('province_id')}}" required>
                                                
                                            </select>
                                            @include('layouts.inputError', ['errorName' => 'province_id'])
                                        </div>
                                        <div class="col-md-6">
                                            <label for="regency_id">Kota/Kabupaten</label>
                                            <select id="regency" name="regency_id" class="form-control @error('regency_id') is-invalid @enderror" value="{{old('regency_id')}}" required>
                                                <option value="">Pilih Provinsi Terlebih Dahulu</option>
                                            </select>
                                            @include('layouts.inputError', ['errorName' => 'regency_id'])
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="address">Alamat</label>
                                    <textarea name="address" id="" class="form-control @error('address') is-invalid @enderror" required>{{old('address')}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="phone">Telepon</label>
                                    <input name="phone" type="text" class="form-control @error('phone') is-invalid @enderror" value="{{old('phone')}}" required>
                                    @include('layouts.inputError', ['errorName' => 'phone'])
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}" required>
                                    @include('layouts.inputError', ['errorName' => 'email'])
                                </div>

                                <div class="form-group">
                                    <label for="website">Website</label>
                                    <input name="website" type="url" class="form-control @error('website') is-invalid @enderror" value="{{old('website')}}">
                                    @include('layouts.inputError', ['errorName' => 'website'])
                                </div>

                                <div class="form-group">
                                    <label for="facebook">Facebook</label>
                                    <input name="facebook" type="text" class="form-control @error('facebook') is-invalid @enderror" value="{{old('facebook')}}">
                                    @include('layouts.inputError', ['errorName' => 'facebook'])
                                </div>

                                <div class="form-group">
                                    <label for="instagram">Instagram</label>
                                    <input name="instagram" type="text" class="form-control @error('instagram') is-invalid @enderror" value="{{old('instagram')}}">
                                    @include('layouts.inputError', ['errorName' => 'instagram'])
                                </div>

                                <div class="form-group">
                                    <label for="youtube">Youtube</label>
                                    <input name="youtube" type="text" class="form-control @error('youtube') is-invalid @enderror" value="{{old('youtube')}}">
                                    @include('layouts.inputError', ['errorName' => 'youtube'])
                                </div>

                                <div class="form-group">
                                    <label for="photo">Foto</label>
                                    <input name="photo" type="file" class="form-control @error('photo') is-invalid @enderror" value="{{old('photo')}}" accept="image/*">
                                    @include('layouts.inputError', ['errorName' => 'photo'])
                                </div>

                                <button type="submit" class="btn btn-primary">
                                    Tambahkan
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            const accreditationOldValue = '{{ old('accreditation') }}';
            
            if(accreditationOldValue !== '') {
                $('#accreditation').val(accreditationOldValue);
            }

            fetch('/api/allProvince')
                .then(res => res.json())
                .then(data => {
                    data.data.forEach(province => {
                        $('#province')
                            .append($("<option></option>")
                            .attr("value", province.id)
                            .text(province.name)); 
                    });
                })
                .catch(err => console.log(err))
        });

        $('#province').change(() => {
            let provinceId = $('#province').val()
            fetch(`/api/regency/${provinceId}`)
                .then(res => res.json())
                .then(data => {
                    $('#regency option').remove()
                    data.data.forEach(regency => {
                        $('#regency')
                            .append($("<option></option>")
                            .attr("value", regency.id)
                            .text(regency.name)); 
                    });
                })
                .catch(err => console.log(err))
        })
    </script>
@endpush