<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\SuperAdmin\StorePesantren;
use App\Http\Requests\SuperAdmin\UpdatePesantren;
use App\Http\Requests\SuperAdmin\StoreAccountPesantren;
use App\Http\Requests\SuperAdmin\UpdateAccountPesantren;
use App\Pesantren;
use App\Registration;
use App\User;

use Storage;
use Str;

class PesantrenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesantrens = Pesantren::all();
        return view('superAdmin.pesantren.index', [
            'pesantrens' => $pesantrens
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superAdmin.pesantren.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePesantren $request)
    {
        $input = $request->all();
        $input['slug'] = Str::slug($request->name, '-');
        if ($request->photo) {
            $input['photo'] = Storage::disk('public')->put('pesantrens', $request->photo);
        }
        $pesantren = Pesantren::create($input);
        Registration::create([
            'pesantren_id' => $pesantren->id
        ]);
        $request->session()->flash('success', 'Pesantren '.$request->name.' berhasil ditambahkan!');
        return redirect(route('superadmin.pesantren.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pesantren $pesantren)
    {
        return view('superAdmin.pesantren.show', [
            'pesantren' => $pesantren
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pesantren $pesantren)
    {
        return view('superAdmin.pesantren.edit', [
            'pesantren' => $pesantren
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePesantren $request, Pesantren $pesantren)
    {
        $input = $request->all();
        $input['slug'] = Str::slug($request->name, '-');
        if ($request->photo) {
            Storage::disk('public')->delete($pesantren->photo);
            $input['photo'] = Storage::disk('public')->put('pesantrens', $request->photo);
        }
        $pesantren->update($input);
        $request->session()->flash('success', 'Pesantren '.$request->name.' berhasil diubah!');
        return redirect(route('superadmin.pesantren.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Pesantren $pesantren)
    {
        $pesantren->delete();
        $request->session()->flash('error', 'Pesantren '.$request->name.' berhasil dihapus!');
        return redirect(route('superadmin.pesantren.index'));
    }


    // Suspend Features
    public function listSuspend()
    {
        $pesantrens = Pesantren::all();
        return view('superAdmin.pesantren.suspend', [
            'pesantrens' => $pesantrens
        ]);
    }

    public function changeSuspend(Request $request, Pesantren $pesantren)
    {
        $pesantren->suspended = $request->status == 'suspend';
        $pesantren->save();
        $request->session()->flash('warning', 'Status Pesantren '.$pesantren->name.' berhasil diubah!');
        return redirect(route('superadmin.pesantren.listSuspend'));
    }

    // Account Features
    public function storeAccount(StoreAccountPesantren $request, Pesantren $pesantren)
    {
        $input = $request->all();
        $input['pesantren_id'] = $pesantren->id;
        User::create($input);
        $request->session()->flash('success', 'Akun Pesantren '.$request->username.' berhasil ditambahkan!');
        return redirect(route('superadmin.pesantren.show', $pesantren->id));
    }

    public function editAccount(Pesantren $pesantren, User $user)
    {
        return view('superAdmin.pesantren.account.edit', [
            'admin' => $user,
            'pesantren' => $pesantren
        ]);
    }

    public function updateAccount(UpdateAccountPesantren $request, Pesantren $pesantren, User $user)
    {
        $user->update($request->all());
        $request->session()->flash('warning', 'Akun '.$request->username.' berhasil diubah!');
        return redirect(route('superadmin.pesantren.show', $pesantren->id));
    }

    public function destroyAccount(Request $request, Pesantren $pesantren, User $user)
    {
        $user->delete();
        $request->session()->flash('error', 'Akun '.$request->username.' berhasil dihapus!');
        return redirect(route('superadmin.pesantren.show', $pesantren->id));
    }
}
