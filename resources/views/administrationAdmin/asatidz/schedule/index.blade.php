<div class="row" id="schedule">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Jadwal {{ env('TEXT_TEACHER', 'Asatidz') }}</h6>
            </div>
            <div class="card-body">
                @include('layouts.alert')
                <div class="row">
                    <div class="col-md-12 text-right">
                        <a href="{{route('administrationadmin.asatidzschedule.create', $asatidz->Asatidz->id)}}" class="btn btn-primary"">
                            Tambah Jadwal
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-3">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Nama Jadwal</th>
                                        <th>Hari</th>
                                        <th>Waktu</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($asatidz->Asatidz->Schedule as $schedule)
                                        <tr>
                                            <td>{{$schedule->name}}</td>
                                            <td>{{$schedule->day}}</td>
                                            <td>{{$schedule->start_time}} - {{$schedule->end_time}}</td>
                                            <td>
                                                @switch($schedule->status)
                                                    @case('publish')
                                                        <h5><span class="badge badge-success">Berlangsung</span></h5>
                                                        @break
                                                    @case('draft')
                                                        <h5><span class="badge badge-warning">Berkas</span></h5>
                                                        @break
                                                @endswitch
                                            </td>
                                            <td>
                                                <a href="{{route('administrationadmin.asatidzschedule.edit', $schedule->id)}}" class="btn btn-warning" data-toggle="tooltip" data-placement="bottom" title="Ubah Jadwal Asatidz">
                                                    <i class="fas fa-fw fa-edit"></i>
                                                </a>
                                                <form action="{{route('administrationadmin.asatidzschedule.destroy', $schedule->id)}}" method="post" style="display: inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Hapus Jadwal Asatidz">
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