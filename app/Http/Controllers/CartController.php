<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    protected $orderModel;
    protected $orderDetailModel;

    public function cart()
    {
        return view('userPage.pages.cart');
    }

    public function add(Request $request, Product $product)
    {
        $colors = ProductType::LIST_COLOR;
        $quantity = $request->quantity;
        $product_type = $product->productType->name ?? '';
        // $color = $product->warehouse->color ?? '';
        $cart = new Cart();
        $cart->addProduct($product,$colors, $product_type, $quantity);
        return response()->json(['message' => 'Add item in cart successful!.', 'count_cart' => count(Session('cart'))]); 
    }

    public function increase_quantity(Request $request)
    {
        $cart = new Cart();
        if ($request->quantity <= 0) {
           $request->quantity = 1;
        }
        $cartItem = $cart->update_cart($request->key, $request->quantity);
        $total_cart = 0;
        $sessionCart = Session::get('cart');

        foreach($sessionCart as $cart){
            $total_cart+= ((int) $cart['item']['quantity']* (int)$cart['item']['product_price']);
        }

        $data = [
            'total_cart' => number_format($total_cart, 0),
            'cart_item' => number_format((int)$cartItem['item']['quantity']* (int)$cartItem['item']['product_price'], 0),
        ];

        return response()->json(['message' => 'Update cart Successful!.', 'data'=> $data]); 
    }

    public function delete(Request $request)
    {
        $cart = new Cart();

        $count = $cart->removeItem($request->key);
        $countCart = count($count); //Count cart in view Cart / Not icon Cart
        $total_cart = 0;
        $sessionCart = Session::get('cart');

        foreach($sessionCart as $cart){
            $total_cart+= ((int) $cart['item']['quantity']* (int)$cart['item']['product_price']);
        }

        return response()->json(['message' => 'Deleted item in cart successful!.','loadpage' => $countCart ,'count_cart' => count(Session('cart')), 'total_cart' => number_format($total_cart, 0)]); 
    }

    public function removeAll()
    {
        $cart = new Cart();

        $cart->removeAll();

        return response()->json(['message' => 'Delete all item successful!']); 
    }
}
