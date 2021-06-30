<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Orders;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CalendarController extends Controller
{
    public function index(){
        
        $category = Category::get();
        return view('adminPage.pages.calendar',compact('category'));
    }
    public function getProducType($id){
        $productType = ProductType::where("category_id",$id)->pluck("name","id_product_type");
        return response()->json($productType);
    }
    // public function getProduct($id){
    //     $product = Product::where("product_type_id",$id)->pluck("id_product");
    //     return response()->json($product);
    // }
    
    public function getOrder($id){
        $order = DB::table('order')
                    ->leftjoin('products', 'order.product_id', '=', 'products.id_product')
                    ->leftjoin('product_types', 'products.product_type_id', '=', 'product_types.id_product_type')
                    ->select('order.quantity','order.id_order','product_types.name','order.color','order.updated_at')->where('id_product_type', '=', $id)
                    ->get();
        foreach($order as $val){
            $newDate = date("d-m-Y", strtotime($val->updated_at)); 
            $event[] = array(
                'start' => $newDate.' 00:00:00',
                'end' => $newDate.' 23:59:59',
                'title' => "ID:#".$val->id_order . "|".$val->name." ".$val->color,
            );
        }
        return response()->json($event);
    }
}
