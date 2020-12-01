<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;
use App\Absent;

class AbsentController extends Controller
{
    public function store(Request $request)
    {
        $dayNow = strtolower(date('l'));
        $timeNow = date('H:i:s');
        $schedules = Schedule::where('asatidz_id', $request->asatidz_id)
                                ->where('day', $dayNow)
                                ->whereTime('start_time', '<=', $timeNow)
                                ->whereTime('end_time', '>=', $timeNow)
                                ->get();
        if (count($schedules) > 0) {
            foreach ($schedules as $schedule) {
                Absent::create([
                    'schedule_id' => $schedule->id,
                    'asatidz_id' => $schedule->id,
                ]);
            }
            $request->session()->flash('success', 'Absen berhasil ditambahkan!');
            return redirect()->back();
        }
        $request->session()->flash('warning', 'Tidak ada jadwal hari ini!');
        return redirect()->back();
    }
}
