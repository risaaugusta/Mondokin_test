<?php

namespace App\Http\Controllers\PesantrenAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use App\User;
use App\Http\Requests\PesantrenAdmin\UpdateProfile;

class HomeController extends Controller
{
    public function index()
    {
        $pesantrenCivitation = User::where('pesantren_id', Auth::user()->pesantren_id)->get();
        return view('pesantrenAdmin.home', [
            'total_asatidz' => count($pesantrenCivitation->where('role', 'asatidz')),
            'total_santri' => count($pesantrenCivitation->where('role', 'santri')),
        ]);
    }

    public function profile()
    {
        return view('pesantrenAdmin.profile');
    }

    public function updateProfile(UpdateProfile $request)
    {
        $input = $request->all();
        if(!$request->password)
            unset($input['password']);

        Auth::user()->update($input);
        $request->session()->flash('warning', 'Profile berhasil diperbarui!');
        return redirect()->back();
    }
}
