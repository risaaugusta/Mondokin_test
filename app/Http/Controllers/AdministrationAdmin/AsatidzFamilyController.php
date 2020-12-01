<?php

namespace App\Http\Controllers\AdministrationAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\AdministrationAdmin\StoreAsatidzFamily;

use App\User;
use App\Asatidz;
use App\Family;

class AsatidzFamilyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Asatidz $asatidz)
    {
        return view('administrationAdmin.asatidz.family.create', [
            'asatidz' => $asatidz
        ]);
    }

    public function createSantri(User $user)
    {
        return view('administrationAdmin.santri.family-create', [
            'user' => $user
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAsatidzFamily $request)
    {
        Family::create($request->all());
        $user = User::find($request->user_id);
        if ($user->role == 'asatidz') {
            $request->session()->flash('success', 'Keluarga Asatidz '.$request->name.' berhasil ditambahkan!');
        return redirect(route('administrationadmin.asatidz.show', $request->user_id));
        } else {
            $request->session()->flash('success', 'Keluarga Santri '.$request->name.' berhasil ditambahkan!');
        return redirect(route('administrationadmin.santri.show', $user->Santri->id));
        }
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
    public function edit(Family $asatidzfamily)
    {
        return view('administrationAdmin.asatidz.family.edit', [
            'family' => $asatidzfamily
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAsatidzFamily $request, Family $asatidzfamily)
    {   
        $user = User::find($asatidzfamily->user_id);
        $asatidzfamily->update($request->all());
        if ($asatidzfamily->User->role == 'asatidz') {
            $request->session()->flash('warning', 'Keluarga Asatidz '.$request->name.' berhasil diubah!');
            return redirect(route('administrationadmin.asatidz.show', $asatidzfamily->user_id));
        } else {
            $request->session()->flash('warning', 'Keluarga Santri '.$request->name.' berhasil diubah!');
            return redirect(route('administrationadmin.santri.show', $user->Santri->id));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Family $asatidzfamily)
    {
        $user = User::find($asatidzfamily->user_id);
        $asatidzfamily->delete();
        if ($asatidzfamily->User->role == 'asatidz') {
            $request->session()->flash('error', 'Keluarga Asatidz '.$asatidzfamily->name.' berhasil dihapus!');
            return redirect(route('administrationadmin.asatidz.show', $asatidzfamily->user_id));   
        } else {
            $request->session()->flash('error', 'Keluarga Santri '.$user->Santri->name.' berhasil dihapus!');
            return redirect(route('administrationadmin.santri.show', $user->Santri->id));
        }
    }
}
