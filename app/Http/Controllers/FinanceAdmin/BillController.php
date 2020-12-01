<?php

namespace App\Http\Controllers\FinanceAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\FinanceAdmin\StoreBill;

use App\Bill;
use Auth;
class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bills = Bill::where('pesantren_id', Auth::user()->pesantren_id)->get();
        return view('financeAdmin.bill.index')->withBills($bills);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('financeAdmin.bill.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBill $request)
    {
        Bill::create($request->all());
        $request->session()->flash('success', 'Tagihan '.$request->name.' berhasil ditambah!');
        return redirect(route('financeadmin.bill.index'));
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
    public function edit(Bill $bill)
    {
        return view('financeAdmin.bill.edit')->withBill($bill);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBill $request, Bill $bill)
    {
        $bill->update($request->all());
        $request->session()->flash('warning', 'Tagihan '.$request->name.' berhasil diubah!');
        return redirect(route('financeadmin.bill.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Bill $bill)
    {
        $bill->delete();
        $request->session()->flash('error', 'Tagihan '.$bill->name.' berhasil dihapus!');
        return redirect(route('financeadmin.bill.index'));
    }
}
