<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    public function post_page()
    {
        return view('admin.post_page');
    }

    public function add_post(Request $request)
    {
        $user=Auth()->user();
        $user_id=$user->id;
        $name=$user->name;
        $usertype=$user->usertype;

        $post=new Post;
        $post->postTitle=$request->postTitle;
        $post->description=$request->description;

        $post->user_id=  $user_id;
        $post->name=$name;
        $post->usertype=$usertype;

        $image=$request->image;
        if($image)
        {
            $imageName=time().'.'.$image->getClientOriginalExtension();
            $request->image->move(public_path('postimages'), $imageName);
            $post->image=$imageName;
        }

        $post->post_status='active';

        $post->save();
        return redirect()->back()->with('message', 'Post Added Successfullly....!!');
    }

    public function show_post()
    {
        $post=Post::all();
        return view('admin.show_post', compact('post'));
    }

    public function delete_post($id)
    {
        $post=Post::find($id);
        $post->delete();
        return redirect()->back()->with('message', 'Post Delete Successfullly....!!');
    }

    public function edit_post($id)
    {
        $post=Post::find($id);
        return view('admin.edit_post', compact('post'));
    }

    public function update_post(Request $request, $id)
    {
        $data =Post::find($id);

        $data->postTitle = $request->postTitle;
        $data->description = $request->description;
        $image=$request->image;
        if($image)
        {
            $imageName=time().'.'.$image->getClientOriginalExtension();
            $request->image->move(public_path('postimages'), $imageName);
            $data->image=$imageName;
        }
        $data->save();
        return redirect()->back()->with('message', 'Post Updated Successfullly....!!');
    }
}

