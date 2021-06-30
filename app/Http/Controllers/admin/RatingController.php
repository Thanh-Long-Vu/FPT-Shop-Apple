<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function index(){
        $listRating = Rating::orderBy('created_at','desc')->get(); 
        return view('adminPage.pages.ratings',compact('listRating'));
    }
    public function updateStatus(Request $request)
    {
        $product = Rating::findOrFail($request->id_rating);
        $product->active = $request->active;
        $product->save();

    return response()->json(['message' => 'Rating status updated successfully.']);
    }
}
