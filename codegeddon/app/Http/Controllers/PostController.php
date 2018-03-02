<?php

namespace App\Http\Controllers;


use Validator;
use Illuminate\Http\Request;
use App\Category;
use App\Topic;
use App\User;
use App\Post;
use Auth;
    
class PostController extends Controller
{
     
    function showAnswer(Request $request, $id) {

        Validator::make($request->all(), [
        'post_content' => 'required|unique:posts|max:255'
        ])->validate();
    	
     	$posts = new Post();
        $posts->post_content = $request->comment;
        $posts->post_topic = $id;
        $posts->post_by = Auth::user()->id;
        $posts->save();

        return response()->json(['comment' => $posts->post_content],200);
    }

    public function deletePost($id) {
        $post = Post::find($id)->delete();
        
    }

    public function editPost(Request $request, $id) {
        $new_posts = Post::findOrFail($id);
        $new_posts->post_content = $request->post_content;
        $new_posts->post_topic = $request->post_id;
        $new_posts->post_by = Auth::user()->id;
        $new_posts->save();

         return redirect('/category/'.$id);
    }

     
}
