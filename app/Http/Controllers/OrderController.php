<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    public function store(Request $request )
    {
        $cart = Session::get('cart');
        if(empty($cart)){
            return redirect()->back()->with('error','Can not checkout because cart is empty !!!!');
        }
        $auth = auth()->user() ?? null;
        $data = $request->all();
        data_set($data, 'status', 3);
        data_set($data, 'user_id', ($auth->id_user ?? 0));
//        dd($data);
        $trasnsaction = Transaction::create($data);
        $orderData = [];
        foreach($cart as $cart){
             array_push($orderData,[
                'price' => $cart['item']['product_price'],
                'quantity' => $cart['item']['quantity'],
                'sale' => $cart['item']['product_discount'],
                'color' => $cart['item']['color'],
                'product_id' => $cart['item']['product']->id_product,
            ]);
        $product = Product::find($cart['item']['product']->id_product);
        $product->active_quantity -= $cart['item']['quantity'];
        $product->save();
        }
        $trasnsaction->product()->attach($orderData);
        Session::put('cart', []);
        return response()->json(['message' => 'Ordered Successful !']);
    }
}
