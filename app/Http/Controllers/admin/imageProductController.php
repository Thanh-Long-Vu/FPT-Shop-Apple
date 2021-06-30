<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ImagesProduct;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;

class imageProductController extends Controller
{
    public function index($id)
    {
        $data = ImagesProduct::where('product_id',$id)->get();
        return view('adminPage.pages.imageProduct.view',compact('data'));
    }
    public function create()
    {
        $product = Product::get();
        return view('adminPage.pages.imageProduct.create',compact('product'));
    }
    public function store(Request $request)
    {
        if($request->hasFile('image')){
            //Xử lý upload Ảnh
            $image_array = $request->file('image');
            $array_len = count($image_array);            

            for($i=0;$i<$array_len;$i++)
            {   
                $image_size = $image_array[$i]->getSize();
                $image_ext = $image_array[$i]->getClientOriginalExtension();
                
                $new_image_name = "uploads/admin/imageProduct/".rand(1,99999).".".$image_ext;

                $destination_path = public_path('/uploads/admin/imageProduct');
                $image_array[$i]->move($destination_path,$new_image_name);
                $table = new ImagesProduct;
                $table->img_url= $new_image_name;
                $table->active = 1;
                $table->product_id = $request->id_product;
                $table->save();
            }                       
            return redirect()->back()->with(['thongbao'=>'success','massage'=>'Thêm ảnh thành công']);
        }
        return redirect()->back();
    }
    public function delete($id){
        $delete = ImagesProduct::find($id);
        $delete->delete();

        return redirect()->back()->with('success', 'Delete sucessfully');
    }
    public function offStatus($id)
    {
        $product = ImagesProduct::find($id);
        $product->active = 0;
        $product->save();
        return back()->with('success', 'Image is not working');
    }
    public function OnlStatus($id)
    {
        $product = ImagesProduct::find($id);
        $product->active = 1;
        $product->save();
        return back()->with('success', 'Image is working');
    }
}
