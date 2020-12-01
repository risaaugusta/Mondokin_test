<?php

namespace App\Http\Controllers\FinanceAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Bill;
use App\BillTransaction;
use App\User;
use App\Santri;

use Auth;
use DB;
use PDF;

class BillTransactionController extends Controller
{

    public function index()
    {
        $bills = Bill::where('pesantren_id', Auth::user()->pesantren_id)->get('id');
        $billsId = [];
        foreach ($bills as $key => $bill) {
            array_push($billsId, $bill->id);
        }
        $bills = BillTransaction::whereIn('bill_id', $billsId)->get();
        return view('financeAdmin.bill.transaction.index')->withBills($bills);
    }

    public function create(Bill $bill)
    {
        $santris = User::whereHas('Santri', function($query){
            $query->where('is_verified', true);
        })->where('pesantren_id', Auth::user()->pesantren_id)->where('role', 'santri')->get();
        return view('financeAdmin.bill.transaction.create', [
            'bill' => $bill,
            'santris' => $santris
        ]);
    }

    public function store(Request $request)
    {
        BillTransaction::create($request->all());
        $request->session()->flash('success', 'Tagihan Santri berhasil ditambahkan!');
        return redirect(route('financeadmin.bill.index'));
    }


    public function storeAll(Request $request)
    {
        $santris= User::wherePesantrenIdAndRole(Auth::user()->pesantren_id, 'santri')->get();
        
        foreach ($santris as $key => $santri) {
            BillTransaction::create([
                'bill_id' => $request->bill_id,
                'santri_id' => $santri->Santri->id
            ]);  
        }
        $request->session()->flash('success', 'Tagihan Kepada Semua Santri berhasil ditambahkan!');
        return redirect(route('financeadmin.bill.index'));
    }

    public function unpaid()
    {
        $bills = Bill::where('pesantren_id', Auth::user()->pesantren_id)->get('id');
        $billsId = [];
        foreach ($bills as $key => $bill) {
            array_push($billsId, $bill->id);
        }
        $bills = BillTransaction::whereIn('bill_id', $billsId)->where('status', 'unpaid')->get();
        return view('financeAdmin.bill.unpaid')->withBills($bills);
    }

    public function confirm()
    {
        $bills = Bill::where('pesantren_id', Auth::user()->pesantren_id)->get('id');
        $billsId = [];
        foreach ($bills as $key => $bill) {
            array_push($billsId, $bill->id);
        }
        $bills = BillTransaction::whereIn('bill_id', $billsId)->where('status', 'paid')->get();
        return view('financeAdmin.bill.confirm')->withBills($bills);
    }

    public function doConfirm(Request $request, BillTransaction $billtransaction, $status)
    {
        $billtransaction->update(['status' => $status]);
        $request->session()->flash('success', 'Tagihan Santri berhasil diubah!');
        return redirect(route('financeadmin.billTransaction.index'));
    }

    public function invoice(BillTransaction $billTransaction)
    {
        $pdf = PDF::loadView('financeAdmin.bill.transaction.invoice', [
            'billTransaction' => $billTransaction
        ]);
        return $pdf->download("invoice mondok.pdf");
    }
}
