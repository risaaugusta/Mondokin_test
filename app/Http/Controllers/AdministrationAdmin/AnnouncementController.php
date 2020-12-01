<?php

namespace App\Http\Controllers\AdministrationAdmin;

use App\Announcement;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdministrationAdmin\StoreAnnouncement;
use App\Http\Requests\AdministrationAdmin\UpdateAnnouncement;
use Storage;
use Auth;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $announcements = Announcement::where('pesantren_id', Auth::user()->pesantren_id)->orderBy('created_at', 'desc')->get();
        return view('administrationAdmin.announcement.index')->withAnnouncements($announcements);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrationAdmin.announcement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAnnouncement $request)
    {
        $input = $request->all();
        if($request->photo)
            $input['photo'] = Storage::disk('public')->put('announcements', $request->photo);

        Announcement::create($input);
        $request->session()->flash('success', 'Pengumuman '.$request->title.' berhasil dibuat!');
        return redirect(route('administrationadmin.announcement.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function show(Announcement $announcement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function edit(Announcement $announcement)
    {
        return view('administrationAdmin.announcement.edit')->withAnnouncement($announcement);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAnnouncement $request, Announcement $announcement)
    {
        $input = $request->all();
        
        if($request->photo){
            if($announcement->photo)
                Storage::disk('public')->delete($announcement->photo);
            $input['photo'] = Storage::disk('public')->put('announcements', $request->photo);
        }

        $announcement->update($input);
        $request->session()->flash('warning', 'Pengumuman '.$request->title.' berhasil diubah!');
        return redirect(route('administrationadmin.announcement.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Announcement $announcement)
    {
        if($announcement->photo)
            Storage::disk('public')->delete($announcement->photo);
        
        $announcement->delete();
        $request->session()->flash('error', 'Pengumuman '.$announcement->title.' berhasil dihapus!');
        return redirect(route('administrationadmin.announcement.index'));
    }
}
