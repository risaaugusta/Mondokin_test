<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pesantren;
use App\Http\Requests\SuperAdmin\UpdateProfile;
use Auth;

class HomeController extends Controller
{
    public function index()
    {
        $pesantrens = Pesantren::get();
        return view('superAdmin.home', [
            'total_pesantren' => count($pesantrens),
            'suspended_pesantren' => count($pesantrens->where('suspended', 1))
        ]);
    }

    public function profile()
    {
        return view('superAdmin.profile');
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
