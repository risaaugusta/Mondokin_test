<?php

namespace App\Http\Controllers\FinanceAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\FinanceAdmin\UpdateProfile;

class HomeController extends Controller
{
    public function index()
    {
        return view('financeAdmin.home');
    }

    public function profile()
    {
        return view('financeAdmin.profile');
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
