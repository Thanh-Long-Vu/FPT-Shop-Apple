<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ImagesProduct;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller
{
    public function index()
    {
        $colors = ProductType::LIST_COLOR;
        $memory = ProductType::MEMORY;
        $category = Category::all();
        $slider = Slider::where('active','=',1)->orderby('updated_at','desc')->limit(5)->get();
        $productSale = Product::where([['discount','>=',30],['is_hot','=',0]])->orderby('updated_at','desc')->limit(6)->get();
        $productHot = Product::where([['discount','>=',20],['is_hot','=',1]])->orderby('updated_at','desc')->limit(6)->get();
        $productRate = Product::orderBy('point','DESC')->limit(6)->get();

        $productTypeMac = ProductType::where('category_id','=',1)->limit(8)->orderby('updated_at','asc')->get();
        $productTypeIpad = ProductType::where('category_id','=',2)->limit(8)->orderby('updated_at','asc')->get();
        $productTypeIphone = ProductType::where('category_id','=',3)->limit(8)->orderby('updated_at','asc')->get();
        $productTypeWatch = ProductType::where('category_id','=',4)->limit(8)->orderby('updated_at','asc')->get();

        $productTypeMacTotalRating = ProductType::where('category_id','=',1)->orderBy('total_rating','desc')->first();
        $productTypeIpadTotalRating = ProductType::where('category_id','=',2)->orderBy('total_rating','desc')->first();
        $productTypeIphoneTotalRating = ProductType::where('category_id','=',3)->orderBy('total_rating','desc')->first();
        $productTypeWatchTotalRating = ProductType::where('category_id','=',4)->orderBy('total_rating','desc')->first();
        return view('userPage.pages.home.home',compact('colors','memory','category','slider','productSale','productHot','productRate','productTypeMac','productTypeIpad','productTypeIphone','productTypeWatch','productTypeMacTotalRating','productTypeIpadTotalRating','productTypeIphoneTotalRating','productTypeWatchTotalRating'));
    }
    public function autoComplete(Request $request){
        $filterAble = $request->only('name~','category_id');
        $productType = ProductType::orderby('name','asc')->filterAble($filterAble)->get();
        $response = array();
        foreach($productType as $productTypeVal){
            $response[] = array("value"=>$productTypeVal->id_product_type,"label"=>$productTypeVal->name);
        }
        return response()->json($response);
    }
    public function errorPage()
    {
        return view('userPage.pages.page404');
    }
    public function product()
    {
        return view('userPage.pages.product');
    }
    public function checkout()
    {
        return view('userPage.pages.checkout');
    }
    public function cart()
    {
        return view('userPage.pages.cart');
    }
    public function track_your_order(){
        return view('userPage.pages.track_your_order');
    }
    public function NotFound(){
        return view('userPage.pages.page404');
    }
    public function Contact(){
        return view('userPage.pages.contact');
    }
}
