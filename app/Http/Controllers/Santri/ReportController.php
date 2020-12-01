<?php

namespace App\Http\Controllers\Santri;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        return view('santri.report');
    }
}
