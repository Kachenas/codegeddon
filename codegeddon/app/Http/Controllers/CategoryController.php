<?php

namespace App\Http\Controllers;


use Validator;
use Illuminate\Http\Request;
use App\Category;
use App\Topic;
use App\User;
use App\Post;
use Auth;

class CategoryController extends Controller
{

     function showCategory() {
        $categories = Category::all();
        $topics = Topic::all();
        $post = Post::all();  

        return view('home', compact('categories','topics','post'));
    }



    public function createCategory()
    {
        return view('/create_category');
        
    }

      function saveCategory(Request $request) {

        Validator::make($request->all(), [
        'category_name' => 'required|unique:posts|max:255',
        'category_description' => 'required',
        ])->validate();

        $new_category = new Category();
        $new_category->category_name = $request->name_category;
        $new_category->category_description = $request->category_description;
        $new_category->user_table_id = Auth::user()->id ;
        $new_category->save();

        return redirect('home');
    }




}
