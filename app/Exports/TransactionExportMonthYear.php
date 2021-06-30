<?php

namespace App\Exports;

use App\Transaction;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class TransactionExportMonthYear implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct(string $month, string $year) 
    {
        $this->month = $month;
        $this->year = $year;
    }
    public function view(): View
    {
        return view('adminPage.pages.transaction.download-excel', [
            'transactions' => DB::table('transaction')
                        ->whereYear('transaction.updated_at','=',$this->year)
                        ->whereMonth('transaction.updated_at','=',$this->month)
                        ->join('payment_method', 'transaction.payment_method_id', '=', 'payment_method.id_payment_method')
                        ->join('users', 'transaction.user_id', '=', 'users.id_user')
                        ->join('order', 'transaction.id_transaction', '=', 'order.transaction_id')
                        ->leftjoin('products', 'order.product_id', '=', 'products.id_product')
                        ->leftjoin('product_types', 'products.product_type_id', '=', 'product_types.id_product_type')
                        ->leftjoin('warehouse', 'products.warehouse_id', '=', 'warehouse.id_warehouse')
                        ->select('transaction.id_transaction','transaction.total_price','transaction.method_receive','users.name as name_user','users.email','users.phone','users.address','order.id_order', 'order.quantity','payment_method.name as name_method_payment','products.price','products.discount','product_types.name as name_product','warehouse.color','warehouse.memory')
                        ->get()
        ]);
    }
}
