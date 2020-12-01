@extends('layouts.app', ['pageTitle' => 'welcome Santri'])

@push('css')
    <link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush

@section('content')
    @include('layouts.alert')
    @if (count($bills) > 0)
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-danger">Tagihan {{ env('TEXT_STUDENT', 'Santri') }}</h6>
                    </div>
                    <div class="card-body">
                        <p>Hi {{Auth::user()->Santri->name}}, kamu memiliki tagihan sebagai berikut:</p>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tagihan</th>
                                    <th>Total</th>
                                    <th>Tanggal Pembayaran</th>
                                    <th>Aksi</th>
                                    <th>Invoice</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bills as $bill)
                                    <tr>
                                        <td>{{$bill->id}}</td>
                                        <td>{{$bill->Bill->name}}</td>
                                        <td>Rp. {{number_format($bill->Bill->amount)}}</td>
                                        <td>{{$bill->Bill->start_date}} s/d {{$bill->Bill->end_date}}</td>
                                        <td>
                                            <form action="{{route('santri.billTransaction.pay')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$bill->id}}">
                                                <button class="btn btn-primary">Bayar</button>
                                            </form>
                                        </td>
                                        <td>
                                            <a href="{{route('santri.billTransaction.invoice', $bill->id)}}" class="btn btn-info" data-toggle="tooltip" data-placement="bottom" title="Lihat Invoice">
                                                <i class="fas fa-fw fa-receipt"></i>
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
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Info Santri</h6>
                </div>
                <div class="card-body">
                    <h4>Hi {{Auth::user()->Santri->name}}</h4>
                    <p>Sekarang saldomu <b>Rp. {{number_format(Auth::user()->Santri->balance)}}</b></p>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#topupModal">
                        Isi Saldo
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="topupModal" tabindex="-1" role="dialog" aria-labelledby="topupModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Isi Saldo {{Auth::user()->Santri->name}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('santri.topup.store')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="santri_id" value="{{Auth::user()->Santri->id}}">
                                        <input type="hidden" name="type" value="transfer">
                                        <div class="form-group text-left">
                                            <label for="amount">Jumlah</label>
                                            <input name="amount" type="number" min="1000" class="form-control @error('amount') is-invalid @enderror" value="{{old('amount')}}" required>
                                            @include('layouts.inputError', ['errorName' => 'amount'])
                                        </div>
                                        <div class="form-group text-left">
                                            <label for="notes">Catatan</label>
                                            <input name="notes" type="text" class="form-control @error('notes') is-invalid @enderror" value="{{old('notes')}}">
                                            @include('layouts.inputError', ['errorName' => 'notes'])
                                        </div>
                                        <div class="form-group text-left">
                                            <label for="confirmation_photo">Bukti Pembayaran</label>
                                            <input name="confirmation_photo" type="file" min="1000" class="form-control @error('confirmation_photo') is-invalid @enderror" required>
                                            @include('layouts.inputError', ['errorName' => 'confirmation_photo'])
                                        </div>
                                        <button class="btn btn-primary">Tambahkan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal -->
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Pengumuman</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Foto</th>
                                            <th>Deskripsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($announcements as $index => $announcement)
                                            <tr>
                                                <td>{{++$index}}</td>
                                                <td>{{$announcement->title}}</td>
                                                <td>
                                                    @isset($announcement->photo)
                                                        <a href="{{ asset('storage/'.$announcement->photo) }}">Lihat foto</a>
                                                    @endisset
                                                </td>
                                                <td>{{$announcement->description}}</td>
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
    @isset($popup)
        {{-- START ANNOUNCEMENT MODAL --}}
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ $popup->title }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @isset($popup->photo)
                        <img src="{{ asset('storage/'.$popup->photo) }}" alt="" class="img-fluid">
                    @endisset
                    {{ $popup->description }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
                </div>
            </div>
        </div>
        {{-- END ANNOUNCEMENT MODAL --}}
    @endisset
@endsection

@push('js')
    <script src="{{asset('admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/js/demo/datatables-demo.js')}}"></script>
    <script>
        $('#exampleModal').modal('show')
    </script>
@endpush