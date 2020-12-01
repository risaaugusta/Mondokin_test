@extends('layouts.app')

@push('css')
    <link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data chat</h6>
                </div>
                <div class="card-body">
                    @include('layouts.alert')
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>NIS</th>
                                            <th>{{ env('TEXT_STUDENT', 'Santri') }}</th>
                                            <th>Kelas</th>
                                            <th>Total Pesan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($chats as $chat)
                                        <tr>
                                                <td>{{$chat[0]->id}}</td>
                                                <td>{{$chat[0]->Santri->nis}}</td>
                                                <td>{{$chat[0]->Santri->name}}</td>
                                                <td>
                                                    @isset($chat[0]->Santri->Classes)
                                                        {{ $chat[0]->Santri->Classes->name }}
                                                        @else
                                                        -
                                                    @endisset    
                                                </td>
                                                <td>{{count($chat)}} pesan</td>
                                                <td>
                                                    <a href="{{route('financeadmin.chat.show', $chat[0]->id)}}" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Lihat Chat">
                                                        <i class="fas fa-fw fa-eye"></i>
                                                    </a>
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
@endsection

@push('js')
    <script src="{{asset('admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/js/demo/datatables-demo.js')}}"></script>

    <script>
        $(function () {
          $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@endpush