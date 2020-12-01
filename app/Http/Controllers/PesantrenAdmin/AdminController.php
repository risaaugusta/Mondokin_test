<?php

namespace App\Http\Controllers\PesantrenAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\PesantrenAdmin\StoreAdmin;
use App\User;

use Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Auth::user()->Pesantren->Admin;
        return view('pesantrenAdmin.admin.index', [
            'admins' => $admins
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdmin $request)
    {
        $input = $request->all();
        User::create($input);
        $request->session()->flash('success', 'Akun Pesantren '.$request->username.' berhasil ditambahkan!');
        return redirect(route('pesantrenadmin.admin.index'));
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
    public function edit(User $admin)
    {
        return view('pesantrenAdmin.admin.edit', [
            'admin' => $admin
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $admin)
    {
        $admin->update($request->all());
        $request->session()->flash('warning', 'Akun '.$request->username.' berhasil diubah!');
        return redirect(route('pesantrenadmin.admin.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $admin)
    {
        $admin->delete();
        $request->session()->flash('error', 'Akun '.$admin->username.' berhasil dihapus!');
        return redirect(route('pesantrenadmin.admin.index'));
    }
}
