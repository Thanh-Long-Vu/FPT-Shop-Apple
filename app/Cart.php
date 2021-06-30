<?php

namespace App;

use Illuminate\Support\Facades\Session;

class Cart
{
    private $cart = [];

    public function __construct()
    {
        $this->cart = Session::get('cart', []);
    }

    public function addProduct($product, $colors, $product_type, $quantity)
    {
        $indexColor = $product->warehouse->color;
        $nameColor = $colors[$indexColor]['name'];
        $key = implode('-', [$product->id, $product_type, $nameColor]);
        $item_new_price = $product->price  * (1 - $product->discount/100);
        $item_new = [
            'product' => $product,
            'quantity' => $quantity,
            'product_type' => $product_type,
            'color' => $nameColor,
            'product_price' => $item_new_price,
            'product_discount' => $product->discount,
        ];
        if (empty($this->cart)) {
            $this->cart[] = [
                'key' => $key,
                'item' => $item_new,
            ];
        } else {
            $flat = false;
            $index = 0;
            for ($i = 0; $i < count($this->cart); $i++) {
                if ($this->cart[$i]['key'] == $key) {
                    $flat = true;
                    $index = $i;
                    break;
                }
            }
            if ($flat) {
                $this->cart[$index]['item']['quantity'] += $quantity;
            } else {
                $this->cart[] = [
                    'key' => $key,
                    'item' => $item_new,
                ];
            }
        }
        Session::put('cart', $this->cart);
    }

    public function update_cart($keyCart, $quantity) {
        $cartItem = [];
        for ($i = 0; $i < count($this->cart); $i++) {
            if ($this->cart[$i]['key'] == $keyCart) {
                $this->cart[$i]['item']['quantity'] = $quantity;
                $cartItem = array_merge($cartItem, $this->cart[$i]);
            }
        }

        Session::put('cart', $this->cart);

        return $cartItem;
    }

    public function removeItem($keyCart)
    {
        for ($i = 0; $i < count($this->cart); $i++) {
            if ($this->cart[$i]['key'] === $keyCart) {
                unset($this->cart[$i]);
                break;
            }
        }
        $data = [];
        foreach ($this->cart as $cart) {
            $data[] = $cart;
        }

        Session::put('cart', $data);
        return $data;
    }

    public function removeAll()
    {
        Session::put('cart', []);
    }
}
