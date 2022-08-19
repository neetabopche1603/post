<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //
    public function viewAddPost()
    {
        return view('addPost');
    }

    public function addPost(Request $request)
    {
        $destinationPath = public_path('/post');
        $filename = '';
        if($request->hasfile('file')){
            $image = $request->file('file');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $filename);
            $post = new Post();
            $post->user_id = Auth::user()->id;
            $post->post = $filename;
            $post->desc = $request->desc;
            $post->save();
        }

        return redirect()->route('home');
    }

    public function addComment(Request $request,$id)
    {
        $comment = new Comment();
        $comment->post_id = $id;
        $comment->user_id = Auth::user()->id;
        $comment->comment = $request->comment;
        $comment->save();

        return redirect()->route('home');
    }

    public function userPost(){
        $data = Post::where('user_id',Auth::user()->id)->get();
        return view('view-post',compact('data'));
    }

    public function editPost($id)
    {
        $data = Post::where('id',$id)->first();
        return view('editPost',compact('data'));
    }

    public function updatePost(Request $request)
    {
        $destinationPath = public_path('/post');
        $filename = '';
        if($request->hasfile('file')){
            $image = $request->file('file');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $filename);

            Post::where('id',$request->post_id)->update(['post'=>$filename,'desc'=>$request->desc]);
        }
        Post::where('id',$request->post_id)->update(['desc'=>$request->desc]);

        return redirect()->route('userPost');
    }

    public function deletePost($id)
    {
        Post::where('id',$id)->delete();
        return redirect()->route('home');
    }

}
