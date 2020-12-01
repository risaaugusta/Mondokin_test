<?php

namespace App\Http\Controllers\FinanceAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\FinanceAdmin\StoreTopup;
use App\User;
use App\Topup;
use App\Santri;
use Auth;
class TopupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $santris = User::whereHas('Santri')->wherePesantrenIdAndRole(Auth::user()->pesantren_id, 'santri')->get();
        $santrisId = [];
        foreach ($santris as $key => $santri) {
            array_push($santrisId, $santri->Santri->id);
        }
        $topups = Topup::whereIn('santri_id', $santrisId)->get();
        return view('financeAdmin.topup.index')->withTopups($topups);
    }

    public function santri()
    {
        $santris = User::whereHas('Santri')->wherePesantrenIdAndRole(Auth::user()->pesantren_id, 'santri')->get();
        return view('financeAdmin.topup.santri')->withSantris($santris);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $santris = User::whereHas('Santri')->where('role', 'santri')->where('pesantren_id', Auth::user()->pesantren_id)->get();
        return view('financeAdmin.topup.create')->withSantris($santris);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTopup $request)
    {
        Topup::create($request->all());
        $santri = Santri::find($request->santri_id);
        $santri->balance = $santri->balance + $request->amount;
        $santri->save();
        $request->session()->flash('success', 'Saldo Santri berhasil ditambahkan!');
        return redirect(route('financeadmin.topup.index'));
    }

    public function confirm(Request $request, Topup $topup)
    {
        $santri = Santri::find($topup->santri_id);
        $santri->balance = $santri->balance + $topup->amount;
        $santri->save();
        $topup->confirmed = 1;
        $topup->save();
        $request->session()->flash('success', 'Saldo Santri berhasil ditambahkan!');
        return redirect(route('financeadmin.topup.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Topup $topup)
    {
        $topup->delete();
        $request->session()->flash('error', 'Saldo Santri berhasil ditolak!');
        return redirect(route('financeadmin.topup.index'));
    }
}
