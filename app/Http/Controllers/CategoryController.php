<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ProductType;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Request $request, Category $category)
    {
        $categoryName = $category->name;
        $categoryId = $category->id_category;
        $productTypes = ProductType::where('category_id',$category->id_category)->orderby('updated_at','asc')->paginate(8);
        return view('userPage.pages.category.categories', compact('categoryName','productTypes','categoryId'));
    }
   public function filterAll(Request $request){
       dd($request->all());
   }
}
