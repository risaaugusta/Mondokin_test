<?php

namespace App\Http\Controllers\AdministrationAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Absent;
use Auth;
class AsatidzAbsentController extends Controller
{
    public function index()
    {
        $absents = Absent::whereHas('Asatidz.User', function($query){
            $query->where('pesantren_id', Auth::user()->pesantren_id);
        })->orderBy('id', 'desc')->get();
        
        return view('administrationAdmin.asatidz.absent.index')->withAbsents($absents);
    }
}
