<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function user(){
        $listUser = User::where('role_id','=',3)->orderBy('updated_at','desc')->get(); 
        return view('adminPage.pages.user.list',compact('listUser'));
    }
    public function coAdmin(){
        
        $listCoAdmin = User::where('role_id','=',2)->orderBy('updated_at','desc')->get(); 
        return view('adminPage.pages.user.list',compact('listCoAdmin'));
    }
    public function create(){
        $role = Role::all();
        return view('adminPage.pages.user.create',compact('role'));
    }
    public function store(Request $request){
        $validatedPassword = Validator::make($request->all(),[
            'newpassword'=>'required|min:8|max:20',
            'confirmpassword'=>'required|same:newpassword'
        ], [
            'newpassword.required'=>'Vui lòng nhập mật khẩu',
            'newpassword.min'=>'Mật khẩu phải dài hơn 8 kí tự',
            'newpassword.max'=>'Mật khẩu dài không quá 20 kí tự',
            'confirmpassword.required'=>'Vui lòng nhập mật khẩu xác nhận',
            'confirmpassword.same'=>'Mật khẩu xác nhận không đúng'
        ]);
        if($validatedPassword->fails()) {
            return redirect()->back()->withErrors($validatedPassword);
        }
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->name .'@gmail.com';
        $user->role_id = $request->role;
        $user->password = Hash::make($request->newpassword);
        $user->save();
        return back();
    }
}
