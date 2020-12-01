<?php

namespace App\Http\Controllers\AdministrationAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\AdministrationAdmin\StoreAsatidzSubject;

use App\AsatidzSubject;
use App\Subject;
use App\Asatidz;

use DB;
use Auth;

class AsatidzSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Subject $subject)
    {
        $subjects = AsatidzSubject::select('asatidz_id')->where('subject_id', $subject->id)->get();
        $registeredAsatidzs = array();
        foreach ($subjects as $key => $subjectLoop) {
            array_push($registeredAsatidzs, $subjectLoop->asatidz_id);
        }
        $asatidzs = DB::table('asatidzs')->join('users', 'users.id', '=', 'asatidzs.user_id')->whereNotIn('asatidzs.id', $registeredAsatidzs)->where('users.pesantren_id', Auth::user()->pesantren_id)->select('asatidzs.*')->get();
        return view('administrationAdmin.asatidz.subject.create', [
            'subject' => $subject,
            'asatidzs' => $asatidzs,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAsatidzSubject $request)
    {
        foreach ($request->asatidz_id as $key => $asatidz) {
            AsatidzSubject::create([
                'subject_id' => $request->subject_id,
                'asatidz_id' => $asatidz,
            ]);
        }
        $request->session()->flash('success', 'Pengajar berhasil ditambah!');
        return redirect(route('administrationadmin.subject.show', $request->subject_id));
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
    public function destroy(Request $request, AsatidzSubject $asatidzsubject)
    {
        $asatidzsubject->delete();
        $request->session()->flash('error', 'Pengajar berhasil dihapus!');
        return redirect(route('administrationadmin.subject.show', $asatidzsubject->subject_id));
    }
}
