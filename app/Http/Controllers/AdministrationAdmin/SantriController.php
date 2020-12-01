<?php

namespace App\Http\Controllers\AdministrationAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSantri;
use App\Http\Requests\AdministrationAdmin\UpdateSantri;
use App\Http\Requests\AdministrationAdmin\VerifySantri;
use App\Santri;
use App\User;

use DB;
use Auth;
use Storage;
class SantriController extends Controller
{

    public function index()
    {
        $santris = Santri::whereHas('User', function($query){
            $query->where('pesantren_id', Auth::user()->pesantren_id);
        })->where('is_verified', true)->get();
        return view('administrationAdmin.santri.index')->withSantris($santris);
    }

    public function create()
    {
        return view('administrationAdmin.santri.create');
    }

    public function store(StoreSantri $request)
    {
        $input = $request->all();
        $input['is_verified'] = 1;
        $user = User::create($input);
        $input['user_id'] = $user->id;
        if ($request->photo) {
            $input['photo'] = Storage::disk('public')->put('santris', $request->photo);
        }
        $santri = Santri::create($input);
        $request->session()->flash('success', 'Santri berhasil ditambahkan!');
        return redirect(route('administrationadmin.santri.index'));
    }

    public function show(Santri $santri)
    {
        return view('administrationAdmin.santri.show')->withSantri($santri);
    }

    public function edit(Santri $santri)
    {
        return view('administrationAdmin.santri.edit')->withSantri($santri);
    }

    public function update(UpdateSantri $request, Santri $santri)
    {
        $input = $request->all();

        if ($request->photo) {
            Storage::disk('public')->delete($santri->photo);
            $input['photo'] = Storage::disk('public')->put('santris', $request->photo);
        }
        $santri->update($input);
        $santri->User->update($input);
        $request->session()->flash('warning', 'Santri '.$request->name.' berhasil diubah!');
        return redirect(route('administrationadmin.santri.show', $santri->id));
    }

    public function verification()
    {
        $santris = User::whereHas('Santri', function($query){
            $query->where('is_verified', false);
        })->where('pesantren_id', Auth::user()->pesantren_id)->get();
        return view('administrationAdmin.santri.verification')->withSantris($santris);
    }

    public function verificationDetail(Santri $santri)
    {
        return view('administrationAdmin.santri.detail')->withSantri($santri);
    }

    public function verify(VerifySantri $request)
    {
        $santri = Santri::find($request->santri_id);
        $santri->nis = $request->nis;
        $santri->is_verified = true;
        $santri->save();

        $user = $santri->User;
        $user->username = $request->username;
        $user->password = $request->password;
        $user->save();
        
        $request->session()->flash('success', "Santri $santri->name berhasil diverifikasi!");
        return redirect(route('administrationadmin.santri.verification'));
    }

    public function verificationReject(Request $request, Santri $santri)
    {
        $santri->delete();
        $santri->User->delete();
        $request->session()->flash('error', "Santri $santri->name ditolak!");
        return redirect(route('administrationadmin.santri.verification'));
    }

    public function destroy(Request $request, Santri $santri)
    {
        $santri->User->delete();
        $santri->delete();
        $request->session()->flash('error', 'Santri '.$santri->name.' berhasil dihapus!');
        return redirect(route('administrationadmin.santri.index'));
    }
}
