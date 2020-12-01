@extends('layouts.app', ['pageTitle' => 'welcome Santri'])

@push('css')
    <style>
        .text-message {
            font-size: 16px;
        }
        .card-border {
            border-radius: 20px;
            padding: 10px;
        }
        .scrollable {
            height: 250px;
            overflow-x: hidden; 
            overflow-x: auto; 
        }
    </style>
@endpush

@section('content')
    @include('layouts.alert')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Chat dengan Admin
                        @switch($type)
                            @case('administration')
                                Administrasi
                                @break
                            @default
                                Keuangan
                        @endswitch
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row scrollable">
                        @foreach ($chats as $chat)
                            @if ($chat->sender == 'santri')
                                <div class="col-md-12 bg-light card-border">
                                    <p>{{Auth::user()->Santri->name}} <small>({{$chat->created_at->format('d-m-Y')}})</small></p>
                                    <p class="text-message text-monospace">{{$chat->message}}</p>
                                </div>
                            @else
                            <div class="col-md-12 bg-light-2 card-border text-right">
                                <p>{{$chat->Pesantren->name}} <small>({{$chat->created_at->format('d-m-Y')}})</small></p>
                                <p class="text-message text-monospace">{{$chat->message}}</p>
                            </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                            <form action="{{route('santri.chat.store')}}" method="post">
                                @csrf
                                <input type="hidden" name="santri_id" value="{{Auth::user()->Santri->id}}">
                                <input type="hidden" name="pesantren_id" value="{{Auth::user()->pesantren_id}}">
                                <input type="hidden" name="type" value="{{ $type }}">
                                <input type="hidden" name="sender" value="santri">
                                <textarea name="message" id="" cols="" rows="" class="form-control"></textarea>
                                <button class="btn btn-primary mt-2">Kirim</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
