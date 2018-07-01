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
use App\Repositories\Contracts\IPostRepository;


class PostController extends Controller
{

    protected $postRepository;
    
    public function __construct(IPostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function Dashboard()
    {  
        $posts= $this->postRepository->getAll();
     
        $users=User::orderBy('created_at', 'desc')->get();
        $tests=Test::orderBy('created_at', 'desc')->get();
        $likes=Like::where('like', 1)->orderBy('created_at', 'desc')->get();
        $likes_on_posts=array_fill(0, sizeof($posts), 0);

        foreach ($posts as $post) {
            $postLikes= $post->likes()->where('like',1)->get();
            $likes_on_posts[$post->id]=$postLikes->count();
        }
        
        return view('home', ['posts' => $posts, 'users'=>$users, 'tests'=>$tests, 'likes'=>$likes , 'likes_on_posts'=>$likes_on_posts], ['user' => Auth::user()]);
    }
         
    
    public function CreatePost(Request $request)
    {
        $this->validate($request, [
        'body'=>'required|max:1000',
        'title'=>'required|max:50'
        ]);
        
        $post=$this->postRepository->savePost($request);
        $message="There was an error while saving your post.";        
        if ($post!=null) {
            $message="Post successfully created!";
        }

        return redirect()->route('home')->with(['message'=>$message]);
    }
  
    public function DeletePost($post_id)
    {
        $message=$this->postRepository->deletePost($post_id);
        return redirect()->route('home')->with(['message'=>$message]);
    }
  
    public function EditPost(Request $request)
    {
        $this->validate($request, [
          'body' => 'required'
        ]);

        $post=$this->postRepository->updatePost($request);
        
        if($post==null){
            return response()->json(['new_body' => ''], 404);
        }
        return response()->json(['new_body' => $post->body], 200);
    }
  
    public function LikePost(Request $request)
    {
        $post_id = $request['postId'];
        $is_like = $request['isLike'] === 'true';
        $update = false;
        $post = $this->postRepository->find($post_id);
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
