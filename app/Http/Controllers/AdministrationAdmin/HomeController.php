<?php

namespace App\Http\Controllers\AdministrationAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Pesantren;
use Auth;
use App\Http\Requests\AdministrationAdmin\UpdateProfile;

class HomeController extends Controller
{
    public function index()
    {
        return view('administrationAdmin.home');
    }

    public function onlineRegistration(Request $request)
    {
        Auth::user()->Pesantren->update($request->all());
        return redirect()->back();
    }

    public function profile()
    {
        return view('administrationAdmin.profile');
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
