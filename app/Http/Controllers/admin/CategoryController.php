<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {        
        $listcategory = Category::all();
        return view('adminPage.pages.category.list',compact('listcategory'));
    }
    public function create()
    {
        return view('adminPage.pages.category.create');
    }
    public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(),[
            'name' => 'required',
            'description' => 'required|string',
            'title' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ], [
            'name.required' => 'Name Category is required',
            'description.required' => 'Description is required',
            'title.required' => 'Title is required',
            'price.required' => 'Price is required',
            'image.required' => 'Image is required',
            'image.image' => 'Type file not true'
        ]);
        if($validatedData->fails()){
            return redirect()->back()->withErrors($validatedData);
        }
        $image = $request->file('image');
        $image_size = $image->getSize();
        $image_ext = $image->getClientOriginalExtension();
        $new_image_name = "uploads/admin/category/category"."thumbail".rand(1,99999).".".$image_ext;

        $destination_path = public_path('/uploads/admin/category');
        $image->move($destination_path,$new_image_name);
        $category = new Category();
        $category->thumbnail = $new_image_name;
        $category->name = $request->name;
        $category->description = $request->description;
        $category->title = $request->title;
        $category->active = 1;
        $category->save();
        return back()->with('success', 'Category Update successfully.');
    }
    public function edit($id){
        $category = Category::find($id); 
        return view('adminPage.pages.category.edit',compact('category'));
    }
    public function update(Request $request,$id){
        $validatedData = Validator::make($request->all(),[
            'name' => 'required',
            'description' => 'required|string',
            'title' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ], [
            'name.required' => 'Name Category is required',
            'description.required' => 'Description is required',
            'title.required' => 'Title is required',
            'price.required' => 'Price is required',
            'image.image' => 'Type file not true'
        ]);
        if($validatedData->fails()){
            return redirect()->back()->withErrors($validatedData);
        }
        $category = Category::find($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->title = $request->title;
        if($category->thumbnail != "" && !isset($request->image)){
            $category->thumbnail;
        }else{
            $image = $request->file('image');
            $image_size = $image->getSize();
            $image_ext = $image->getClientOriginalExtension();
            $new_image_name = "uploads/admin/category/category"."thumbnail".rand(1,99999).".".$image_ext;
            $destination_path = public_path('/uploads/admin/category');
            $image->move($destination_path,$new_image_name);
            $category->thumbnail = $new_image_name;
        }
        $category->save();
        return redirect('admin/category')->with('success', 'Category Update successfully.');
    }
    public function updateStatus(Request $request)
    {
        $productType = Category::findOrFail($request->category_id);
        $active = (int)($request->active);
        $productType->active = $active;
        $productType->save();

    return response()->json(['message' => 'Category status updated successfully.']);
    }
    
    public function delete($id){
        $deleteCategory = Category::find($id);
        $deleteCategory->delete();

        return redirect()->back();
    }
    public function history(){
        $viewCategory = Category::onlyTrashed()->get();
        return view ('adminPage.pages.category.historydelete',compact('viewCategory'));
    }
    public function restore($id){
        $retoreCategory = Category::withTrashed()->find($id);
        $retoreCategory->restore();
        return redirect()->back()->with(['notify'=>'success','massage'=>'Khôi phục thành công']);
    }
}
