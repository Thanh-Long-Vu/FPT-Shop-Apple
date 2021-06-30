<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductTypeController extends Controller
{
    public function index()
    {
        $productType = ProductType::orderBy('id_product_type', 'DESC')->get();
        return view('adminPage.pages.producttype.list',compact('productType'));
    }
    public function create()
    {
        $category = Category::all();
        return view('adminPage.pages.producttype.create',compact('category'));
    }
    public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(),[
            'name' => 'required',
            'description' => 'required',
            'warranty' => 'required|integer|min:1',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ], [
            'name.required' => 'Name Product Type is required',
            'description.required' => 'Description is required',
            'warranty.required' => 'Warranty is required',
            'price.required' => 'Price is required',
            'image.required' => 'Image is required',
            'image.image' => 'Type file not true'
        ]);
        if($validatedData->fails()){
            return back()->withErrors($validatedData);
        }
        $image = $request->file('image');
        $image_size = $image->getSize();
        $image_ext = $image->getClientOriginalExtension();
        $new_image_name = "uploads/admin/productype/productype"."thumbail".rand(1,99999).".".$image_ext;
        $destination_path = public_path('/uploads/admin/productype');
        $image->move($destination_path,$new_image_name);
        
        $productType = new ProductType();
        $productType->thumbnail = $new_image_name;
        $productType->name = $request->name;
        $productType->description = $request->description;
        $productType->warranty = $request->warranty;
        $productType->category_id = $request->id_category;
        $productType->active = 1;
        $dataNameCondition = $request->name_fied;
        $dataValuesCondition = $request->value;
        $result = array_combine($dataNameCondition,$dataValuesCondition);
        $productType->data = $result;
        $productType->save();
        return redirect()->back()->with('success', 'Product Type update successfully.');
    }
    public function edit($id)
    {
        $productType = ProductType::find($id); 
        $datalist = $productType->data;
        $category = Category::all();
        return view('adminPage.pages.producttype.edit',compact('productType','category','datalist'));
    }
    public function update(Request $request,$id)
    {
        $validatedData = Validator::make($request->all(),[
            'name' => 'required',
            'description' => 'required|string',
            'warranty' => 'required|integer|min:1',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ], [
            'name.required' => 'Name Product Type is required',
            'description.required' => 'Description is required',
            'warranty.required' => 'Warranty is required',
            'image.image' => 'Type file not true'
        ]);
        if($validatedData->fails()){
            return redirect()->back()->withErrors($validatedData);
        }
        $productType = ProductType::find($id);
        if($productType->thumbnail != "" && !isset($request->image)){
            $productType->thumbnail;
        }else{
            $image = $request->file('image');
            $image_size = $image->getSize();
            $image_ext = $image->getClientOriginalExtension();
            $new_image_name = "uploads/admin/productype/productype"."thumbnail".rand(1,99999).".".$image_ext;
            $destination_path = public_path('/uploads/admin/productype/');
            $image->move($destination_path,$new_image_name);
            $productType->thumbnail = $new_image_name;
        }
        $productType->name = $request->name;
        $productType->description = $request->description;
        $productType->warranty = $request->warranty;
        $productType->category_id = $request->category_id;
        $dataNameCondition = $request->name_fied;
        $dataValuesCondition = $request->value;
        $result = array_combine($dataNameCondition,$dataValuesCondition);
        $productType->data = $result;
        $productType->save();
        return redirect('admin/producttype')->with('success', 'Product Type update successfully.');
    }
    public function updateStatus(Request $request)
    {
        $productType = ProductType::findOrFail($request->product_type_id);
        $productType->active = $request->active;
        $productType->save();

    return response()->json(['message' => 'ProductType status updated successfully.']);
    }
    public function delete($id){
        $delete = ProductType::find($id);
        $delete->delete();

        return redirect()->back();
    }
    public function history(){
        $view = ProductType::onlyTrashed()->get();
        return view ('adminPage.pages.producttype.historydelete',compact('view'));
    }
    public function restore($id){
        $restore = ProductType::withTrashed()->find($id);
        $restore->restore();
        return redirect()->back()->with(['notify'=>'success','massage'=>'Khôi phục thành công']);
    }
}
