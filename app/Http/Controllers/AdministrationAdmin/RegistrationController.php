<?php

namespace App\Http\Controllers\AdministrationAdmin;

use App\Http\Controllers\Controller;
use App\Registration;
use Illuminate\Http\Request;

use Auth;
use Storage;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registration = Registration::wherePesantrenId(Auth::user()->pesantren_id)->first();
        return view('administrationAdmin.registration')->withRegistration($registration);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function show(Registration $registration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function edit(Registration $registration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Registration $registration)
    {
        $input = $request->all();
        Auth::user()->Pesantren->update([
            'online_registration' => $input['online_registration']
        ]);
        if ($request->offline_document) {
            if ($registration->offline_document) {
                Storage::disk('public')->delete($registration->offline_document);
            }
            $input['offline_document'] = Storage::disk('public')->put('registrations', $request->offline_document);
        }
        $registration->update($input);
        $request->session()->flash('warning', 'Registration Online berhasil diubah!');
        return redirect(route('administrationadmin.registration.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function destroy(Registration $registration)
    {
        //
    }
}
