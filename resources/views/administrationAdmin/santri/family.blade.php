<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Keluarga {{ env('TEXT_STUDENT', 'Santri') }}</h6>
            </div>
            <div class="card-body">
                @include('layouts.alert')
                <div class="row">
                    <div class="col-md-12 text-right">
                        <a href="{{route('administrationadmin.asatidzfamily.createSantri', $santri->User->id)}}" class="btn btn-primary"">
                            Tambah Keluarga
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-3">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Status Keluarga</th>
                                        <th>Nama</th>
                                        <th>Pekerjaan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($santri->User->Family as $family)
                                        <tr>
                                            <td>
                                                @switch($family->status)
                                                    @case('father')
                                                        Ayah
                                                        @break
                                                    @case("mother")
                                                        Ibu
                                                        @break
                                                    @case("husband")
                                                        Suami
                                                        @break
                                                    @case("wife")
                                                        Istri
                                                        @break
                                                    @case("child")
                                                        Anak
                                                        @break
                                                    @case("delegate")
                                                        Wali
                                                        @break
                                                @endswitch
                                            </td>
                                            <td>{{$family->name}}</td>
                                            <td>{{$family->occupation ?: '-'}}</td>
                                            <td>
                                                <a href="{{route('administrationadmin.asatidzfamily.edit', $family->id)}}" class="btn btn-warning" data-toggle="tooltip" data-placement="bottom" title="Ubah Data Asatidz">
                                                    <i class="fas fa-fw fa-edit"></i>
                                                </a>
                                                <form action="{{route('administrationadmin.asatidzfamily.destroy', $family->id)}}" method="post" style="display: inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Hapus Data Asatidz">
                                                        <i class="fas fa-fw fa-trash"></i>
                                                    </button>
                                                </form>
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