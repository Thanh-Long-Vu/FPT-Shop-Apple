<?php

namespace App\Http\Controllers\admin;

use App\Exports\TransactionExport;
use App\Exports\TransactionExportMonthYear;
use App\Http\Controllers\Controller;
use App\Models\Orders;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Excel;
use Maatwebsite\Excel\Facades\Excel as FacadesExcel;

class TransactionController extends Controller
{
    public function index()
    {
        $data = Transaction::where('status', '!=', '4')->orderBy('created_at', 'DESC')->get();
        return view('adminPage.pages.transaction.list', compact('data'));
    }
    public function orderview($id)
    {
        $transaction = Transaction::find($id);
        $order = Orders::where('transaction_id', '=', $id)->get();
        $totalprice = 0;
        foreach ($order as $products) {
            $totalprice += $products->price * $products->quantity;
        }
        $sale = (1 - ($transaction->total_price / $totalprice)) * 100;
        return view('adminPage.pages.transaction.detail', compact('order', 'transaction', 'totalprice', 'sale'));
    }
    public function updateStatus(Request $request)
    {
        $transaction = Transaction::findOrFail($request->id_transaction);
        $transaction->status = $request->status;
        $transaction->save();
        if ($transaction->status == 0) {
            return response()->json(['message' => 'Order status changed to in progress ']);
        } else {
            return response()->json(['message' => 'Order status changed to delivery']);
        }
    }
    public function changeStatus($id)
    {
        $transaction = Transaction::find($id);
        $transaction->status = 0;
        $transaction->save();
        return back();
    }
    public function statistics()
    {
        $statistics = Transaction::where('status', '=', 4)->orderby('updated_at', 'DESC')->get();
        return view('adminPage.pages.transaction.statistics', compact('statistics'));
    }
    public function exportExcelTransaction(Request $request)
    {
        if(empty($request->month)){
            return FacadesExcel::download(new TransactionExport, 'TransactionExport.xlsx');
        }elseif(!empty($request->month)) {
            $month = date("m",strtotime($request->month));
            $year = date("Y",strtotime($request->month));
            return FacadesExcel::download(new TransactionExportMonthYear($month,$year), 'TransactionExport_'.$month.$year.'.xlsx');
        }
    }
}
