<?php

namespace App\Http\Controllers\Santri;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\BillTransaction;
use App\Announcement;
use Auth;
use App\Http\Requests\Santri\UpdateProfile;

class HomeController extends Controller
{
    public function index()
    {
        $bills = BillTransaction::where('santri_id', Auth::user()->Santri->id)->where('status', 'unpaid')->get();
        $announcements = Announcement::where('pesantren_id', Auth::user()->pesantren_id)->orderBy('created_at', 'desc')->get()->take(5);
        $popup = $announcements->where('start_date', '<=', date('Y-m-d'))->where('end_date', '>=', date('Y-m-d'))->first();
        
        return view('santri.home', [
            'bills' => $bills,
            'popup' => $popup,
            'announcements' => $announcements,
        ]);
    }

    public function profile()
    {
        return view('santri.profile');
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
