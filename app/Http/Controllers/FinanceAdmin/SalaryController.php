<?php

namespace App\Http\Controllers\FinanceAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\FinanceAdmin\StoreSalary;
use App\Salary;

use Auth;
use DB;
use Storage;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salaries = Salary::whereHas('Asatidz')->where('pesantren_id', Auth::user()->pesantren_id)->get();
        return view('financeAdmin.salary.index')->withSalaries($salaries);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $asatidzs = DB::table('asatidzs')->join('users', 'users.id', '=', 'asatidzs.user_id')->where('pesantren_id', Auth::user()->pesantren_id)->select('asatidzs.*')->get();
        return view('financeAdmin.salary.create', [
            'asatidzs' => $asatidzs
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSalary $request)
    {
        $input = $request->all();
        $input['file'] = Storage::disk('public')->put('salaries', $request->file);
        Salary::create($input);
        $request->session()->flash('success', 'Gaji Asatidz berhasil ditambahkan!');
        return redirect(route('financeadmin.salary.index'));
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
    public function destroy($id)
    {
        //
    }

    public function unreceived()
    {
        $salaries = Salary::where('pesantren_id', Auth::user()->pesantren_id)->where('received', false)->get();
        return view('financeAdmin.salary.index')->withSalaries($salaries);
    }
}
