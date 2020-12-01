<?php

namespace App\Http\Controllers\Asatidz;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Asatidz\StoreTahfidz;
use App\User;
use App\Tahfidz;
use Auth;

class TahfidzController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('asatidz.tahfidz.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $santris = User::whereHas('Santri', function($query){
            $query->where('is_verified', true);
        })->where('role', 'santri')->where('pesantren_id', Auth::user()->pesantren_id)->get();
        return view('asatidz.tahfidz.create')->withSantris($santris);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTahfidz $request)
    {
        Tahfidz::create($request->all());
        $request->session()->flash('success', 'Tahfidz berhasil ditambah!');
        return redirect(route('asatidz.tahfidz.index'));
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
    public function edit(Tahfidz $tahfidz)
    {
        return view('asatidz.tahfidz.edit')->withTahfidz($tahfidz);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTahfidz $request, Tahfidz $tahfidz)
    {
        $tahfidz->update($request->all());
        $request->session()->flash('warning', 'Tahfidz berhasil diubah!');
        return redirect(route('asatidz.tahfidz.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Tahfidz $tahfidz)
    {
        $tahfidz->delete();
        $request->session()->flash('error', 'Tahfidz berhasil dihapus!');
        return redirect(route('asatidz.tahfidz.index'));
    }
}
