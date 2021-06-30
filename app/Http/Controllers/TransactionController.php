<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    public function index(){
        return view('userPage.pages.track_your_order');
    }
    public function track_order(Request $request){
        $transactionId = $request->Transactionid;
        $email = $request->email;
        // dd($order = Orders::where('transaction_id','=',$transactionId)->product->price);
        if(is_numeric($transactionId)){
            $dataTransaction = Transaction::find($transactionId);
            // dd($checkTransaction);
            if(!is_null($dataTransaction)){
                $infoCustomer = $dataTransaction->addtional_data;
                $getEmail = $infoCustomer[1]["value"];
                if(!is_null($email)){
                    if($getEmail == $email){
                        $order = Orders::where('transaction_id','=',$transactionId)->get();
                        $totalprice = 0 ;
                        foreach ($order as $products) {
                            $totalprice += $products->price * $products->quantity;
                        }
                        $sale = (1- ($dataTransaction->total_price / $totalprice)) *100;
                        return view('userPage.ajax.trackOrderAjax',compact('dataTransaction','order','sale','totalprice'));
                    }else{
                        return response()->json([
                            'success' => 'false',
                            'errors'  => 'Email is incorrect with Data.',
                        ],400);
                    }
                }else{
                    return response()->json([
                        'success' => 'false',
                        'errors'  => 'Please enter email.',
                    ],400);
                }
            }else {
                return response()->json([
                    'success' => 'false',
                    'errors'  => 'This Transaction ID is not found.',
                ],400);
            }
        }else {
            return response()->json([
                'success' => 'false',
                'errors'  => 'Please enter input type number.',
            ],400);
        }
        // if($checkTransaction->)
    }
}
