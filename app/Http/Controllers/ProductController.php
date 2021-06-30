<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductType;
use App\Models\Rating;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(Request $request, Product $product)
    {
        $colors = ProductType::LIST_COLOR;
        $memory = ProductType::MEMORY;

        $product->currentPrice = ($product->discount > 0)
            ? ($product->price - ($product->price * ($product->discount / 100)))
            : $product->price;
        $product->specification = $product->productType ? $product->productType->data : "";

        $ratingForProduct = Rating::where('product_id','=',$product->id_product)->get();
        $product->ratingForProduct = $ratingForProduct ?? "";

        return view('userPage.pages.product.index', compact('product', 'colors', 'memory'));
    }
}
