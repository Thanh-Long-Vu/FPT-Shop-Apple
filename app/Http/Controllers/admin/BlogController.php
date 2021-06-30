<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    public function index()
    {
        $list_blog = Blog::all();
        return view('adminPage.pages.blog.list', compact('list_blog'));
    }

    public function create()
    {
        return view('adminPage.pages.blog.create');
    }

    public function store(Request $request)
    {
        $image = $request->file('avatar') ?? "";
        $image_ext = $image->getClientOriginalExtension() ?? "";
        $new_image_name = "uploads/admin/blog/"."thumbnail".rand(1,99999).".".$image_ext ?? "";
        $destination_path = public_path('/uploads/admin/blog');
        $image->move($destination_path,$new_image_name);
        $blog = new Blog();
        $blog->title = $request->title ?? "";
        $blog->description = $request->description ?? "";
        $blog->active = $request->active ?? 0;
        $blog->content = $request->content_text ?? "";
        $blog->avatar = $new_image_name ?? "";
        $blog->product_type_id = 1;
        $blog->save();

        return redirect()->route('admin.blog.list.get')->with('create_success', 'Create success');
    }
    public function edit(int $id)
    {
        $blogDetail = Blog::find($id);
        return view('adminPage.pages.blog.edit', compact('blogDetail'));
    }
    public function update(Request $request, int $id)
    {
        $validatedData = Validator::make($request->all(),[
            'title' => 'required',
            'description' => 'required|string',
            'active' => 'required',
            'content_text' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ], [
            'title.required' => 'Title Blog is required',
            'description.required' => 'Description is required',
            'active.required' => 'Active is required',
            'content_text.required' => 'Content is required',
            'image.image' => 'Type file not true'
        ]);
        if($validatedData->fails()){
            return redirect()->back()->withErrors($validatedData);
        }
        $blogEdit = Blog::find($id);
        $blogEdit->title = $request->title ?? $blogEdit->title;
        $blogEdit->description = $request->description ?? $blogEdit->description;
        $blogEdit->active = $request->active ?? $blogEdit->active;
        $blogEdit->content = $request->content_text ?? $blogEdit->content;
        if($request->file('avatar') === null){
            $blogEdit->avatar;
        }else{
            $image = $request->file('avatar') ?? "";
            $image_ext = $image->getClientOriginalExtension() ?? "";
            $new_image_name = "uploads/admin/blog/"."thumbnail".rand(1,99999).".".$image_ext ?? "";
            $destination_path = public_path('/uploads/admin/blog');
            $image->move($destination_path,$new_image_name);
            $blogEdit->avatar = $new_image_name;
        }
        $blogEdit->save();
        return redirect()->route('admin.blog.list.get')->with('edit_success', 'Edit success');
    }


    public function delete(int $id)
    {
        $daleteBlog = Blog::find($id);
        $daleteBlog->delete();
        return back()->with('success', 'Blog delete successfully.');
    }

}
