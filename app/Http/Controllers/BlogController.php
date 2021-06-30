<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request) {
        $list_blog = Blog::where("active", "=", "1")->orderBy("updated_at", "desc")->paginate(6);

        if ($request->ajax()) {
            return view('userPage.ajax.itemBlog', compact('list_blog'));
        }

        return view('userPage.pages.blog', compact('list_blog'));
    }

    public function detail($idBlog) {
        if(empty($idBlog)){
            return redirect()->route("blog");
        }else{
            $blogDetail = Blog::where("id_blog","=",$idBlog)->first();
            $blogIdAfter = Blog::select('id_blog')->where("id_blog",">",$idBlog)->first()->id_blog ?? 0;
            $blogIdBefore = Blog::select('id_blog')->where("id_blog","<",$idBlog)->first()->id_blog ?? 0;
            $list_suggest = Blog::select('id_blog', 'title', 'avatar', 'updated_at')->where("active", "=", "1")->orderBy("updated_at", "desc")->limit(10)->get();
            return view('userPage.pages.blog-detail', compact('blogDetail', 'blogIdAfter', 'blogIdBefore', 'list_suggest'));
        }
    }
}
