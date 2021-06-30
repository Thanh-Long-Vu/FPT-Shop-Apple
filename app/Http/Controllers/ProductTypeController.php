<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductType;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class ProductTypeController extends Controller
{
    public function show(Request $request, ProductType $productType)
    {
        $colors = ProductType::LIST_COLOR;
        $memory = ProductType::MEMORY;
        $nameProductType = $productType->name;
        $nameCategory = $productType->category->name;
        $idCategory = $productType->category->id_category;
        $productTypes = ProductType::where('category_id', $productType->category_id)->orderBy('updated_at','asc')->get();
        $products = Product::where('product_type_id',$productType->id_product_type)->orderBy('updated_at','asc')->paginate(8);
//        dd($products);
        // $filter = $product->whereIn($product->first()->warehouse->color,1)->get();
        // dd($filter);
        return view('userPage.pages.category.categories', compact('productTypes', 'products','colors','memory','idCategory','nameCategory','nameProductType'));
    }
public function filterProduct(Request $request)
    {
        // dd($request->all());

        $prices = $request->prices;
        $colors = $request->colors;
        $memories = $request->memories;
        // dd($prices);
        $product = Product::where([['product_type_id',1],['id_product',1]]);
        $filter = $product->where($product->warehouse->first()->color,1)->get();
        dd($filter);
        // if(!empty($prices)&& !empty($colors) && !empty($memories)){
        //     if($prices = 0){
        //     }elseif ($prices = 1) {
        //         # code...
        //     }elseif ($prices = 2) {
        //         # code...
        //     }elseif ($prices = 3) {
        //         # code...
        //     }elseif ($prices = 4) {
        //         # code...
        //     }
        // }elseif((empty($prices) && empty($colors)) && !empty($memories)){
        //     dd('Memory isset');
        // }elseif(!empty($colors) && (empty($prices) &&  empty($memories ))){
        //     dd('colors isset');
        // }elseif(!empty($prices) && (empty($colors) && empty($memories))){
        //     dd('price isset');
        // }elseif((!empty($prices) && !empty($colors)) && empty($memories)){
        //     dd('price color isset');
        // }
        // elseif((!empty($prices) && !empty($memories)) && empty($colors)){
        //     dd('price memory isset');
        // }
        // elseif((!empty($colors) && !empty($memories)) && empty($prices)){
        //     dd('color memory isset');
        // }
        // elseif(empty($prices)&& empty($colors) && empty($memories)){
        //     dd('Không tồn tại');
        // }

        // // if(empty($prices) )
        // return view('userPage.pages.categories', compact('products'));
    }
}
