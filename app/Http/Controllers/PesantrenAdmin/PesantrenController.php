<?php

namespace App\Http\Controllers\PesantrenAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\PesantrenAdmin\StorePesantren;
use App\Pesantren;
use App\User;

use Storage;
use Str;
use Auth;

class PesantrenController extends Controller
{
    public function edit()
    {
        $pesantren = Auth::user()->Pesantren;
        return view('pesantrenAdmin.pesantren.edit', [
            'pesantren' => $pesantren
        ]);
    }    

    public function update(Request $request, Pesantren $pesantren)
    {
        $input = $request->all();
        $input['slug'] = Str::slug($request->name, '-');
        if ($request->photo) {
            Storage::disk('public')->delete($pesantren->photo);
            $input['photo'] = Storage::disk('public')->put('pesantrens', $request->photo);
        }
        $pesantren->update($input);
        $request->session()->flash('success', 'Pesantren '.$request->name.' berhasil diubah!');
        return redirect(route('pesantrenadmin.home'));
    }
}
