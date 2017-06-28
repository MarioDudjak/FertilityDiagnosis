<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Post;
use App\Like;
use App\User;
use App\Test;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class PostController extends Controller
{
    public function getDashboard(){
        $posts=Post::orderBy('created_at','desc')->get();
        $number_of_posts=0;
        
        foreach($posts as $post){
            if($post->user_id == Auth::user()->id){
                $number_of_posts++;
            }
        }
        $users=User::orderBy('created_at','desc')->get();
        $tests=Test::orderBy('created_at','desc')->get();
        $likes=Like::where('like',1)->orderBy('created_at','desc')->get();
        $likes_on_posts=array_fill(0,sizeof($posts),0);
        foreach($posts as $post){
         $br=0;
        foreach($likes as $like){
            if($like->like==1 && $like->post_id==$post->id)
                $br++;
            }
        $likes_on_posts[$post->id]=$br;
        } 
        
        return view('home',['posts' => $posts, 'users'=>$users, 'tests'=>$tests, 'likes'=>$likes , 'likes_on_posts'=>$likes_on_posts],['user' => Auth::user()]);
    }
    
  public function postCreatePost(Request $request){
  $this->validate($request,[
      'body'=>'required|max:1000',
      'title'=>'required|max:50'
    ]);
      $post = new Post();
      $post->body = $request['body'];
      $post->title =$request['title'];
      $message="There was an error while saving your post.";
      if($request->user()->posts()->save($post)){
          $message="Post successfully created!";
      }
      return redirect()->route('home')->with(['message'=>$message]);
  }
  
  public function getDeletePost($post_id)
  {
      $post=Post::where('id',$post_id)->first();
      if(Auth::user() != $post->user){
          return redirect()->back();
      }
      $post->likes()->delete();
      $post->delete();
      return redirect()->route('home')->with(['message'=>'Successfully deleted!']);
  }
  
  public function postEditPost(Request $request)
  {
      $this->validate($request, [
          'body' => 'required'
      ]);
      $post = Post::find($request['postId']);
      if(Auth::user() != $post->user){
          return redirect()->back();
      }
      $post->body = $request['body'];
      $post ->update();
      return response()->json(['new_body' => $post->body],200);
  }
  
 public function postLikePost(Request $request)
    {
        $post_id = $request['postId'];
        $is_like = $request['isLike'] === 'true';
        $update = false;
        $post = Post::find($post_id);
        if (!$post) {
            return null;
        }
        $user = Auth::user();
        
        $like = $user->likes()->where('post_id', $post_id)->first();
        if ($like) {
            $already_like = $like->like;
            $update = true;
            if ($already_like == $is_like) {
                $like->delete();
                return null;
            }
        } else {
            $like = new Like();
        }
        $like->like = $is_like;
        $like->user_id = $user->id;
        $like->post_id = $post->id;
        if ($update) {
            $like->update();
        } else {
            $like->save();
        }
      
        return null;
    }
}



