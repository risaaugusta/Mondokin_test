<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pesantren;
use App\Http\Requests\StoreSantri;

use App\User;
use App\Santri;
use App\Family;
use App\Http\Requests\Registration;

use Auth;
use Storage;
class HomeController extends Controller
{
    
    public function landingPage()
    {
        $pesantrens = Pesantren::all();
        return view('welcome')->withPesantrens($pesantrens);
    }

    public function pesantrenAll()
    {
        $pesantrens = Pesantren::where('suspended', false)->get();
        return view('pesantrenAll')->withPesantrens($pesantrens);
    }
    
    public function pesantren($slug)
    {
        $pesantren = Pesantren::where('slug', $slug)->first();
        if ($pesantren) {
            return view('pesantren')->withPesantren($pesantren);
        } else {
            abort(404);
        }
    }

    public function createSantri($slug)
    {
        $pesantren = Pesantren::where('slug', $slug)->first();
        if ($pesantren) {
            return view('registration')->withPesantren($pesantren);
        } else {
            abort(404);
        }
    }

    public function storeSantri(Registration $request)
    {
        $input = $request->all();
        $user = User::create([
            'email' => $input['email'],
            'username' => $input['email'],
            'password' => $input['email'],
            'role' => 'santri',
            'pesantren_id' => $input['pesantren_id'],
        ]);
        $input['user_id'] = $user->id;
        if ($request->photo) {
            $input['photo'] = Storage::disk('public')->put('santris', $request->photo);
        }
        Santri::create($input);
        $request->session()->flash('success', 'Santri berhasil ditambahkan!');
        return redirect()->back();
    }

    public function index()
    {
        switch (Auth::user()->role) {
            case 'super_admin':
                return redirect(route('superadmin.home'));
                break;

            case 'pesantren_admin':
                return redirect(route('pesantrenadmin.home'));
                break;

            case 'administration_admin':
                return redirect(route('administrationadmin.home'));
                break;

            case 'finance_admin':
                return redirect(route('financeadmin.home'));
                break;

            case 'asatidz':
                return redirect(route('asatidz.home'));
                break;

            case 'santri':
                return redirect(route('santri.home'));
                break;
            
            default:
                return 'on progress';
        }
    }
}
