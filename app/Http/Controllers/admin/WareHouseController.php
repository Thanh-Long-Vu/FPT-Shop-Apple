<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\RequestWareHouse;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class wareHouseController extends Controller
{
    public function index()
    {        
        $listWareHouses = Warehouse::all();
        return view('adminPage.pages.warehouse.list',compact('listWareHouses'));
    }
    public function create()
    {
        $category = Category::all();
        $productType = ProductType::all();
        return view('adminPage.pages.warehouse.create',compact('category','productType'));
    }
    public function edit($id)
    {
        $wareHouse = Warehouse::find($id);
        return view('adminPage.pages.warehouse.edit',compact('wareHouse'));
    }
    public function update(Request $request, $id){
        $validatedData = Validator::make($request->all(),[
            'name' => 'required',
            'quantity' => 'required|integer|min:1',
            'IMEI' => 'required|string',
            'price' => 'required|integer|min:50',
            'warranty' => 'required|integer|min:1'
        ], [
            'name.required' => 'Name is required',
            'quantity.required' => 'Quantity is required',
            'IMEI.required' => 'IMEI is required',
            'price.required' => 'Price is required',
            'warranty.required' => 'warranty is required',
            'quantity.min' => 'Min is 1',
            'price.min' => 'Min is 50',
            'warranty.min' => 'Min is 1'
        ]);
        if($validatedData->fails()){
            return redirect()->back()->withErrors($validatedData);
        }
        $wareHouse = Warehouse::find($id);
        $wareHouse->name = $request->name;
        $wareHouse->warranty = $request->warranty;
        $wareHouse->price = $request->price;
        $wareHouse->IMEI = $request->IMEI;
        $wareHouse->color = $request->color;
        $wareHouse->memory = $request->memory;
        $wareHouse->quantity = $request->quantity;
        if($request->quantity_sell > 0){
            $wareHouse->quantity += $request->quantity_sell;
        }
        $wareHouse->save();
        return redirect('admin/warehouse')->with('success', 'WareHouse Update successfully.');
    }
    public function postcreate(Request $request){
        
        $validatedData = Validator::make($request->all(),[
            'name' => 'required',
            'quantity' => 'required|integer|min:1',
            'IMEI' => 'required|string',
            'price' => 'required|integer|min:50',
            'warranty' => 'required|integer|min:1'
        ], [
            'name.required' => 'Name is required',
            'quantity.required' => 'Quantity is required',
            'IMEI.required' => 'IMEI is required',
            'price.required' => 'Price is required',
            'warranty.required' => 'warranty is required',
            'quantity.min' => 'Min is 1',
            'price.min' => 'Min is 50',
            'warranty.min' => 'Min is 1'
        ]);
        if($validatedData->fails()){
            return redirect()->back()->withErrors($validatedData);
        }
        $wareHouse = new Warehouse();
        $wareHouse->name = $request->name;
        $wareHouse->warranty = $request->warranty;
        $wareHouse->price = $request->price;
        $wareHouse->IMEI = $request->IMEI;
        $wareHouse->color = $request->color;
        $wareHouse->memory = $request->memory;
        $wareHouse->quantity = $request->quantity;
        $wareHouse->active = 0;
        $wareHouse->save();

        return back()->with('success', 'WareHouse Create successfully.');
    }
    public function updateStatus(Request $request)
    {
        $productType = Warehouse::findOrFail($request->warehouse_id);
        $productType->active = $request->active;
        $productType->save();

    return response()->json(['message' => 'Warehouse status updated successfully.']);
    }
    public function delete($id){
        $deleteWarehouse = Warehouse::find($id);
        $deleteWarehouse->delete();

        return redirect()->back();
    }
    public function history(){
        $viewWareHouse = Warehouse::onlyTrashed()->get();
        return view ('adminPage.pages.warehouse.historydelete',compact('viewWareHouse'));
    }
    public function restore($id){
        $retoreWareHouse = Warehouse::withTrashed()->find($id);
        $retoreWareHouse->restore();
        return redirect()->back()->with(['notify'=>'success','massage'=>'Khôi phục thành công']);
    }
}
