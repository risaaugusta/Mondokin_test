<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Akun {{$pesantren->name}}</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 text-right">
                        <button type="button" href="{{route('superadmin.pesantren.create')}}" class="btn btn-primary mb-1" data-toggle="modal" data-target="#insertModal">
                            Tambah Akun
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="insertModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="insertModalLabel">Tambah Akun {{$pesantren->name}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{route('superadmin.pesantren.storeAccount', $pesantren->id)}}" method="post">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group text-left">
                                                <label for="role">Jenis Akun</label>
                                                <select id="role" name="role" class="form-control @error('role') is-invalid @enderror" value="{{old('role')}}">
                                                    <option value="" disabled selected>Pilih Jenis Akun</option>
                                                    <option value="pesantren_admin">Admin Pesantren</option>
                                                    <option value="administration_admin">Admin Administrasi</option>
                                                    <option value="finance_admin">Admin Keuangan</option>
                                                    <option value="canteen_staff">Petugas Kantin</option>
                                                </select>
                                                @include('layouts.inputError', ['errorName' => 'role'])
                                            </div>
                                            <div class="form-group text-left">
                                                <label for="username">Username</label>
                                                <input name="username" type="text" class="form-control @error('username') is-invalid @enderror" value="{{old('username')}}">
                                                @include('layouts.inputError', ['errorName' => 'username'])
                                            </div>
                                            <div class="form-group text-left">
                                                <label for="email">Email</label>
                                                <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}">
                                                @include('layouts.inputError', ['errorName' => 'email'])
                                            </div>
                                            <div class="form-group text-left">
                                                <label for="password">Password</label>
                                                <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" value="{{old('password')}}">
                                                @include('layouts.inputError', ['errorName' => 'password'])
                                            </div>
                                            <div class="form-group text-left">
                                                <label for="password_confirmation">Konfirmasi Password</label>
                                                <input name="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" value="{{old('password_confirmation')}}">
                                                @include('layouts.inputError', ['errorName' => 'password_confirmation'])
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary">Tambahkan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal -->
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Jenis Akun</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pesantren->Admin as $admin)
                                <tr>
                                    <td>{{$admin->id}}</td>
                                    <td>{{$admin->username}}</td>
                                    <td>{{$admin->email}}</td>
                                    <td>
                                        @switch($admin->role)
                                            @case('pesantren_admin')
                                                Admin Pesantren
                                                @break
                                            @case('administration_admin')
                                                Admin Administrasi
                                                @break
                                            @case('finance_admin')
                                                Admin Keuangan
                                                @break
                                            @case('canteen_staff')
                                                Staff Kantin
                                                @break
                                        @endswitch
                                    </td>
                                    <td>
                                        <a href="{{route('superadmin.pesantren.editAccount', ['pesantren' => $pesantren->id, 'user' => $admin->id])}}" class="btn btn-warning" data-toggle="tooltip" data-placement="bottom" title="Ubah Data Akun">
                                            <i class="fas fa-fw fa-edit"></i>
                                        </a>
                                        <form action="{{route('superadmin.pesantren.destroyAccount', ['pesantren' => $pesantren->id, 'user' => $admin->id])}}" method="post" style="display: inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Hapus Data Akun">
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