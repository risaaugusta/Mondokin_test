<?php

namespace App\Http\Controllers\AdministrationAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\AdministrationAdmin\StoreAsatidz;
use App\Asatidz;
use App\User;

use Auth;
use Storage;

class AsatidzController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asatidzs = User::where('role', 'asatidz')->where('pesantren_id', Auth::user()->pesantren_id)->get();
        return view('administrationAdmin.asatidz.index', [
            'asatidzs' => $asatidzs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrationAdmin.asatidz.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAsatidz $request)
    {
        $user = User::create($request->all());

        $input = $request->all();
        $input['user_id'] = $user->id;
        $input['photo'] = Storage::disk('public')->put('asatidzs', $request->photo);
        Asatidz::create($input);

        $request->session()->flash('success', 'Asatidz '.$request->name.' berhasil ditambahkan!');
        return redirect(route('administrationadmin.asatidz.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $asatidz)
    {
        return view('administrationAdmin.asatidz.show', [
            'asatidz' => $asatidz
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $asatidz)
    {
        return view('administrationAdmin.asatidz.edit', [
            'asatidz' => $asatidz
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAsatidz $request, User $asatidz)
    {
        $input = $request->all();
        $asatidz->update($input);

        if ($request->photo) {
            Storage::disk('public')->delete($pesantren->photo);
            $input['photo'] = Storage::disk('public')->put('pesantrens', $request->photo);
        }
        $asatidz->Asatidz->update($input);
        $request->session()->flash('warning', 'Asatidz '.$request->name.' berhasil diubah!');
        return redirect(route('administrationadmin.asatidz.show', $asatidz->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $asatidz)
    {
        $asatidz->Asatidz->delete();
        $asatidz->delete();
        $request->session()->flash('error', 'Asatidz '.$request->name.' berhasil dihapus!');
        return redirect(route('administrationadmin.asatidz.index'));
    }
}
