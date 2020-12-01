<?php

namespace App\Http\Controllers\AdministrationAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdministrationAdmin\StoreClass;

use App\Classes;
use App\Santri;

use Auth;
use DB;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = Classes::where('pesantren_id', Auth::user()->pesantren_id)->get();
        return view('administrationAdmin.class.index')->withClasses($classes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrationAdmin.class.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClass $request)
    {
        Classes::create($request->all());
        $request->session()->flash('success', 'Jenjang berhasil ditambah!');
        return redirect(route('administrationadmin.class.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Classes $class)
    {
        return view('administrationAdmin.class.show')->withClass($class);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Classes $class)
    {
        return view('administrationAdmin.class.edit')->withClass($class);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreClass $request, Classes $class)
    {
        $class->update($request->all());
        $request->session()->flash('warning', 'Jenjang berhasil diubah!');
        return redirect(route('administrationadmin.class.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Classes $class)
    {
        $class->delete();
        $request->session()->flash('error', 'Jenjang berhasil dihapus!');
        return redirect(route('administrationadmin.class.index'));
    }

    public function input(Classes $class)
    {
        $santris = DB::table('santris')->join('users', 'users.id', '=', 'santris.user_id')->where('users.pesantren_id', Auth::user()->pesantren_id)->where('santris.class_id', null)->select('santris.*')->get();
        return view('administrationAdmin.class.input', [
            'class' => $class,
            'santris' => $santris
        ]);
    }

    public function insert(Request $request, Classes $class)
    {
        $request->validate([
            'santri_id' => 'required|array',
        ]);
        
        foreach ($request->santri_id as $id) {
            $santri = Santri::find($id);
            $santri->class_id = $class->id;
            $santri->save();
        }
        $request->session()->flash('success', 'Jenjang Santri berhasil ditambahkan!');
        return redirect(route('administrationadmin.class.show', $class->id));
    }

    public function remove(Request $request)
    {
        $santri = Santri::find($request->santri_id);
        $santri->class_id = null;
        $santri->save();

        $request->session()->flash('error', 'Jenjang Santri berhasil dihapus!');
        return redirect(route('administrationadmin.class.show', $request->class_id));
    }
}
