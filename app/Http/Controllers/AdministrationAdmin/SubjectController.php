<?php

namespace App\Http\Controllers\AdministrationAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\AdministrationAdmin\StoreSubject;
use App\Subject;

use Auth;
class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::where('pesantren_id', Auth::user()->pesantren_id)->get();
        return view('administrationAdmin.subject.index')->withSubjects($subjects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrationAdmin.subject.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubject $request)
    {
        Subject::create($request->all());
        $request->session()->flash('success', 'Mata Pelajaran berhasil ditambah!');
        return redirect(route('administrationadmin.subject.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        return view('administrationAdmin.subject.show')->withSubject($subject);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        return view('administrationAdmin.subject.edit')->withSubject($subject);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSubject $request, Subject $subject)
    {
        $subject->update($request->all());
        $request->session()->flash('warning', 'Mata Pelajaran berhasil diubah!');
        return redirect(route('administrationadmin.subject.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Subject $subject)
    {
        $subject->delete();
        $request->session()->flash('error', 'Mata Pelajaran berhasil dihapus!');
        return redirect(route('administrationadmin.subject.index'));
    }
}
