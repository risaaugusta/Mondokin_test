<?php

namespace App\Http\Controllers\Santri;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\BillTransaction;
use PDF;
class BillTransactionController extends Controller
{
    public function pay(Request $request)
    {
        $bill = BillTransaction::findOrFail($request->id);
        $bill->pay_date = date("Y-m-d");
        $bill->status = 'paid';
        $bill->save();
        $request->session()->flash('success', 'Tagihan berhasil dibayar, silahkan tunggu konfirmasi dari Admin');
        return redirect(route('santri.home'));
    }

    public function invoice(BillTransaction $billTransaction)
    {
        $pdf = PDF::loadView('financeAdmin.bill.transaction.invoice', [
            'billTransaction' => $billTransaction
        ]);
        return $pdf->download("invoice mondok.pdf");
    }
}
