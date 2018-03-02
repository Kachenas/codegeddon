<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
Use App\Topic;
use App\Post;
use App\Category;
use Auth;

class TopicController extends Controller
{
     function showTopics($id) {
        $topics = Topic::all();
        $categories = Category::find($id);
        $cat_id = $categories->id;
        $posts = Post::all();
        return view('/webdev', compact('topics', 'categories', 'cat_id', 'posts'));
    }


    function createTopic($id) {
        $topic_id = $id;
        return view('/create_topic', compact('topic_id'));
    }

    function saveTopic(Request $request) {

        Validator::make($request->all(), [
        'topic_subject' => 'required|unique:posts|max:255'
        ])->validate();

        $new_topic = new Topic();
        $new_topic->topic_subject = $request->topic_content;
        $new_topic->topic_cat = $request->topic_id;
        $new_topic->topic_by = Auth::user()->id ;
        $new_topic->save();
        $id =  $request->topic_id;

        return redirect('/category/'.$id);
    }

     function editTopic($id, Request $request) {
        $new_topic = Topic::findOrFail($id);
        $new_topic->topic_subject = $request->topic_subject;
        $new_topic->topic_cat = $request->category_id;
        $new_topic->topic_by = Auth::user()->id ;
        $new_topic->save();
        $id =  $request->category_id;

        return redirect('/category/'.$id);
    }

     function deleteTopic($id) {
        
        Topic::find($id)->delete();

        return redirect('/home');
    }



}
