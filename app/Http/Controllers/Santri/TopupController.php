<?php

namespace App\Http\Controllers\Santri;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Santri\StoreTopup;

use App\Topup;
use Storage;
class TopupController extends Controller
{
    public function store(StoreTopup $request)
    {
        $input = $request->all();
        $input['confirmation_photo'] = Storage::disk('public')->put('topup', $request->confirmation_photo);
        Topup::create($input);
        $request->session()->flash('success', 'Saldo berhasil ditambah, silahkan menunggu admin untuk konfirmasi');
        return redirect()->back();
    }
}
