<?php

namespace App\Http\Controllers\AdministrationAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdministrationAdmin\StoreReport;
use App\User;
use App\Report;
use Auth;
use DB;
use Storage;
class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reports = DB::table('users')
                        ->join('santris', 'santris.user_id', '=', 'users.id')
                        ->join('reports', 'reports.santri_id', '=', 'santris.id')
                        ->where('users.pesantren_id', Auth::user()->pesantren_id)
                        ->where('users.role', 'santri')
                        ->select(['santris.*', 'reports.*'])
                        ->get();
        return view('administrationAdmin.santri.report.index')->withReports($reports);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $santris = User::whereHas('Santri')->where('role', 'santri')->where('pesantren_id', Auth::user()->pesantren_id)->get();
        return view('administrationAdmin.santri.report.create')->withSantris($santris);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReport $request)
    {
        $input = $request->all();
        $input['file'] = Storage::disk('public')->put('reports', $request->file);
        Report::create($input);
        $request->session()->flash('success', 'Raport berhasil ditambah!');
        return redirect(route('administrationadmin.report.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        return $report;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        return view('administrationAdmin.santri.report.edit')->withReport($report);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreReport $request, Report $report)
    {
        $input = $request->all();
        if ($request->file) {
            Storage::disk('public')->delete($request->file);
            $input['file'] = Storage::disk('public')->put('reports', $request->file);
        }
        $report->update($input);
        $request->session()->flash('warning', 'Raport berhasil diubah!');
        return redirect(route('administrationadmin.report.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Report $report)
    {
        Storage::disk('public')->delete($report->file);
        $report->delete();
        $request->session()->flash('error', 'Raport berhasil dihapus!');
        return redirect(route('administrationadmin.report.index'));
    }
}
