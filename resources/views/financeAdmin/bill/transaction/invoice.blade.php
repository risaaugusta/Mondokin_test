<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{public_path().'/admin/css/sb-admin-2.min.css'}}">
    <style>
        .icon {
            width: 20px;
        }
        .text-footer {
            font-size: 12px;
            margin-top: -5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <img src="{{public_path().'/images/logo-text-green.svg'}}" alt="">
                <p>Kwitansi - #{{$billTransaction->id}} ({{$billTransaction->created_at->format('d-m-Y')}})</p>
                <h3>
                    @switch($billTransaction->status)
                        @case('unpaid')
                            <span class="badge badge-danger">BELUM LUNAS</span>
                            @break
                        @case('paid')
                            <span class="badge badge-warning">MENUNGGU KONFIRMASI</span>
                            @break
                        @default
                            <span class="badge badge-primary">LUNAS</span>
                    @endswitch
                </h3>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p class="text-primary mb-0">Total</p>
                <h3>Rp. {{number_format($billTransaction->Bill->amount)}}</h3>
            </div>
        </div>
        <div class="row">
            <table class="table">
                <tr>
                    <td>
                        <p class="text-primary">Kepada</p>
                        <p class="mb-0">NIS:</p>
                        <p class="ml-2 font-weight-bold">{{$billTransaction->Santri->nis}}</p>
                        <p class="mb-0">Nama Santri:</p>
                        <p class="ml-2 font-weight-bold">{{$billTransaction->Santri->name}}</p>
                        <p class="mb-0">Kode Tagihan:</p>
                        <p class="ml-2 font-weight-bold">{{$billTransaction->Bill->code}}</p>
                        <p class="mb-0">Tujuan Pembayaran:</p>
                        <p class="ml-2 font-weight-bold">{{$billTransaction->Bill->name}}</p>
                    </td>
                    <td>
                        <p class="text-primary">Details</p>
                        <p class="mb-0">Metode Pembayaran:</p>
                        <p class="ml-2 font-weight-bold">Transfer</p>
                        <p class="mb-0">Total:</p>
                        <p class="ml-2 font-weight-bold">Rp. {{number_format($billTransaction->Bill->amount)}}</p>
                    </td>
                </tr>
            </table>
        </div>
        <div class="row">
            <table class="table">
                <tr>
                    <td>
                        <p class="font-weight-bold text-footer"><img src="{{public_path().'/images/instagram.png'}}" alt="" class="icon"> @Mondok.id</p>
                    </td>
                    <td>
                        <p class="font-weight-bold text-footer"><img src="{{public_path().'/images/facebook.png'}}" alt="" class="icon"> Forum Mondok</p>    
                    </td>
                    <td>
                        <p class="font-weight-bold text-footer"><img src="{{public_path().'/images/gmail.png'}}" alt="" class="icon"> contact@mondok.id</p>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>