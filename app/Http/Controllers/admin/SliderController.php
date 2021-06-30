<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{
    public function index(){
        $listSlider = Slider::orderBy('created_at','desc')->get(); 
        return view('adminPage.pages.slider.list',compact('listSlider'));
    }
    public function create()
    {
        return view('adminPage.pages.slider.create');
    }
    public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(),[
            'name' => 'required',
            'image' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ], [
            'name.required' => 'Name Category is required',
            'image.required' => 'Image is required',
            'image.image' => 'Type file not true'
        ]);
        if($validatedData->fails()){
            return redirect()->back()->withErrors($validatedData);
        }
        $image = $request->file('image');
        $image_ext = $image->getClientOriginalExtension();
        $new_image_name = "uploads/admin/slider/slider"."thumbnail".rand(1,99999).".".$image_ext;
        $destination_path = public_path('/uploads/admin/slider');
        $image->move($destination_path,$new_image_name);
        $slider = new Slider();
        $slider->image_url = $new_image_name;
        $slider->name = $request->name;
        $slider->save();
        
        return back()->with('success', 'Add Image successfully.');
    }
    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('adminPage.pages.slider.edit',compact('slider'));
    }
    public function update(Request $request,$id)
    {
        $validatedData = Validator::make($request->all(),[
            'name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ], [
            'name.required' => 'Name Slider is required',
            'image.image' => 'Type file not true'
        ]);
        if($validatedData->fails()){
            return back()->withErrors($validatedData);
        }
        //Update Table Product
        $slider = Slider::find($id);
        if($slider->image_url != "" && !isset($request->image)){
            $slider->image_url;
        }else{
            $image = $request->file('image');
            $image_size = $image->getSize();
            $image_ext = $image->getClientOriginalExtension();
            $new_image_name = "uploads/admin/slider/slider"."thumbnail".rand(1,99999).".".$image_ext;
            $destination_path = public_path('/uploads/admin/slider');
            $image->move($destination_path,$new_image_name);
            $slider->image_url = $new_image_name;
        }
        $slider->name = $request->name;
        $slider->save();
        return redirect('admin/slider')->with('success', 'Slider update successfully.');

    }
    public function delete($id){
        $delete = Slider::find($id);
        $delete->delete();

        return redirect()->back()->with('success', 'Delete sucessfully');
    }
    public function updateStatus(Request $request)
    {
        $product = Slider::findOrFail($request->id_slider);
        $product->active = $request->active;
        $product->save();

    return response()->json(['message' => 'Slider status updated successfully.']);
    }
}
