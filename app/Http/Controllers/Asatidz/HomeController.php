<?php

namespace App\Http\Controllers\Asatidz;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use App\Salary;
use App\Http\Requests\Asatidz\UpdateProfile;

class HomeController extends Controller
{
    public function index()
    {
        $salaries = Salary::whereAsatidzIdAndReceived(Auth::user()->Asatidz->id, 0)->get();
        return view('asatidz.home')->withSalaries($salaries);
    }

    public function salary()
    {
        $salaries = Salary::where('asatidz_id', Auth::user()->Asatidz->id)->get();
        return view('asatidz.salary')->withSalaries($salaries);
    }

    public function salaryConfirm(Request $request, Salary $salary)
    {
        $salary->received = true;
        $salary->save();
        $request->session()->flash('success', 'Gaji Asatidz berhasil dikonfirmasi!');
        return redirect(route('asatidz.salary'));
    }

    public function profile()
    {
        return view('asatidz.profile');
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
