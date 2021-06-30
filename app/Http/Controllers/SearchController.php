<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;
use Illuminate\Http\JsonResponse;

class SearchController extends Controller
{
    public function index(Request $request){
        $colors = ProductType::LIST_COLOR;
        $memory = ProductType::MEMORY;
        $categoryId = $request->category_id;
        $productType = $request->productType;
        if((empty($categoryId) && !empty($productType)) || (!empty($categoryId) && !empty($productType))){
            $productType = ProductType::where('name',$productType)->orderby('created_at','desc')->first();
            $product = Product::where('product_type_id',$productType->id_product_type)->paginate(8);
            return view('userPage.pages.resultSearch',compact('product','productType','colors','memory'));
        }
    }
    public function getOption(Request $request){
        $colors = ProductType::LIST_COLOR;
        $memory = ProductType::MEMORY;
        $optionFilter = $request->filter;
        $searchProductType = $request->productType_id;
        $queryProduct = Product::query();
        if ($optionFilter == 0 ) {
            $queryProduct->where('product_type_id',$searchProductType)->orderBy('updated_at','asc');
        }elseif($optionFilter == 1 ) {
            $queryProduct->where('product_type_id',$searchProductType)->orderby('updated_at','desc');
        } elseif($optionFilter == 2) {
            $queryProduct->where('product_type_id',$searchProductType)->orderby('price','asc');
        } elseif($optionFilter == 3 ) {
            $queryProduct->where('product_type_id',$searchProductType)->orderby('price','desc');
        }
        $product = $queryProduct->paginate(8);
        return response()->json([ view('userPage.ajax.resultSearchAjax', compact('product','colors','memory','optionFilter'))->render()]);
    }

}
