<?php

namespace App\Http\Controllers\AdministrationAdmin;

use App\Http\Controllers\Controller;
use App\PesantrenType;
use Illuminate\Http\Request;
use Auth;

class PesantrenTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = PesantrenType::wherePesantrenId(Auth::user()->pesantren_id)->get();
        return view('administrationAdmin.type.index')->withTypes($types);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrationAdmin.type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        PesantrenType::create($request->all());
        $request->session()->flash('success', 'Tipe Pesantren berhasil ditambah!');
        return redirect(route('administrationadmin.pesantrentype.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PesantrenType  $pesantrenType
     * @return \Illuminate\Http\Response
     */
    public function show(PesantrenType $pesantrenType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PesantrenType  $pesantrenType
     * @return \Illuminate\Http\Response
     */
    public function edit(PesantrenType $pesantrentype)
    {
        return view('administrationAdmin.type.edit')->withType($pesantrentype);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PesantrenType  $pesantrenType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PesantrenType $pesantrentype)
    {
        $pesantrentype->update($request->all());
        $request->session()->flash('warning', 'Tipe Pesantren berhasil diubah!');
        return redirect(route('administrationadmin.pesantrentype.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PesantrenType  $pesantrenType
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, PesantrenType $pesantrentype)
    {
        $pesantrentype->delete();
        $request->session()->flash('error', 'Tipe Pesantren berhasil dihapus!');
        return redirect(route('administrationadmin.pesantrentype.index'));
    }
}
