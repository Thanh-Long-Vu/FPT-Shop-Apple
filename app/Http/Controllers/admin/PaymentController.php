<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    public function index(){
        $payment = PaymentMethod::orderBy('created_at','desc')->get(); 
        return view('adminPage.pages.payment.list',compact('payment'));
    }
    public function create()
    {
        return view('adminPage.pages.payment.create');
    }
    public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(),[
            'name' => 'required',
            'logo' => 'required'
        ], [
            'name.required' => 'Name payment method is required.',
            'image.required' => 'Logo is required.'
        ]);
        if($validatedData->fails()){
            return redirect()->back()->withErrors($validatedData);
        }
        $payment = new PaymentMethod();
        $payment->logo = $request->logo;
        $payment->name = $request->name;
        $payment->save();
        
        return back()->with('success', 'Creat payment successfully.');
    }
    public function edit($id)
    {
        $payment = PaymentMethod::find($id);
        return view('adminPage.pages.payment.edit',compact('payment'));
    }
    public function update(Request $request,$id)
    {
        $validatedData = Validator::make($request->all(),[
            'name' => 'required',
            'logo' => 'required'
        ], [
            'name.required' => 'Name payment method is required.',
            'image.required' => 'Logo is required.'
        ]);
        if($validatedData->fails()){
            return back()->withErrors($validatedData);
        }
        //Update Table Product
        $payment = PaymentMethod::find($id);
        $payment->logo = $request->logo;        
        $payment->name = $request->name;
        $payment->save();
        return redirect('admin/payment/list')->with('success', 'Payment update successfully.');

    }
}
