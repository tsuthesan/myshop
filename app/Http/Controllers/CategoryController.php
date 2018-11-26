<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function category(){
        return view('categories.category');
    }


    public function addCategory(Request $request){
      $this->validate( $request,[

          'category' =>  'required'
      ]);
        $category = new Category;
        $category->category = $request->input('category');
        $category->save();
        return redirect('/category')->with('response', 'Category Added Successfully');

    }
}
