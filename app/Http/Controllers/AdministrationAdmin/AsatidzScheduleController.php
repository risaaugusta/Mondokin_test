<?php

namespace App\Http\Controllers\AdministrationAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\AdministrationAdmin\StoreAsatidzSchedule;

use App\Asatidz;
use App\Schedule;
use Auth;

class AsatidzScheduleController extends Controller
{

    private $days = ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = Schedule::whereHas('Asatidz.User', function($query){
            $query->where('pesantren_id', Auth::user()->pesantren_id);
        })->get();
        return view('administrationAdmin.asatidz.schedule.all')->withSchedules($schedules);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Asatidz $asatidz)
    {
        return view('administrationAdmin.asatidz.schedule.create', [
            'asatidz' => $asatidz
        ]);
    }

    public function createBulk()
    {
        $asatidzs = Asatidz::whereHas('User', function($query){
            $query->where('pesantren_id', Auth::user()->pesantren_id);
        })->get();
        return view('administrationAdmin.asatidz.schedule.createBulk')->withAsatidzs($asatidzs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAsatidzSchedule $request)
    {
        if ($request->day == 'everyday') {
            foreach ($this->days as $day) {
                $input = $request->all();
                $input['day'] = $day;
                Schedule::create($input);
            }
        } else {
            Schedule::create($request->all());
        }
        $asatidz = Asatidz::find($request->asatidz_id);
        $request->session()->flash('success', 'Jadwal Asatidz berhasil ditambah!');
        return redirect(route('administrationadmin.asatidz.show', $asatidz->user_id));
    }

    public function storeBulk(Request $request)
    {
        if ($request->day = 'everyday') {
            foreach ($this->days as $day) {
                foreach ($request->asatidzs as $asatidz) {
                    $input = $request->all();
                    $input['asatidz_id'] = $asatidz;
                    $input['day'] = $day;
                    Schedule::create($input);
                }
            }
        } else {
            foreach ($request->asatidzs as $asatidz) {
                $input = $request->all();
                $input['asatidz_id'] = $asatidz;
                Schedule::create($input);
            }
        }
        $request->session()->flash('success', 'Jadwal Asatidz berhasil ditambah!');
        return redirect(route('administrationadmin.asatidzschedule.index'));
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
    public function edit(Schedule $asatidzschedule)
    {
        return view('administrationAdmin.asatidz.schedule.edit', [
            'schedule' => $asatidzschedule
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAsatidzSchedule $request, Schedule $asatidzschedule)
    {
        $asatidzschedule->update($request->all());
        $request->session()->flash('warning', 'Jadwal Asatidz  berhasil diubah!');
        return redirect(route('administrationadmin.asatidz.show', $asatidzschedule->Asatidz->user_id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Schedule $asatidzschedule)
    {
        $asatidzschedule->delete();
        $request->session()->flash('error', 'Jadwal Asatidz  berhasil dihapus!');
        return redirect(route('administrationadmin.asatidz.show', $asatidzschedule->Asatidz->user_id));
    }
}
