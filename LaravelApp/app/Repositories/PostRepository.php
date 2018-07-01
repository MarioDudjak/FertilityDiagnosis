<?php
namespace App\Repositories;

use App\Repositories\Contracts\IPostRepository;
use App\Post;

class PostRepository implements IPostRepository
{
        public function __construct()
        {
        }
        
        public function getAll()
        {
            $posts=Post::orderBy('created_at', 'desc')->get();
            return $posts;            
        }

        public function savePost($request)
        {    
            $post = new Post();
            $post->body = $request['body'];
            $post->title =$request['title'];
            if ($request->user()->posts()->save($post)) {
                return $post;
            }
            else{
                return null;
            }
        }
        
        public function deletePost($id)
        {
            $post=Post::where('id', $id)->first();
            try{
                $post->likes()->delete();
                $post->delete();
                return 'Successfully deleted!';
            }
            catch(\Exception $exception){
                return 'Error while deleting:'.$exception->getCode();           
            }
  
        }
    
        public function updatePost($request)
        {
            $post = Post::find($request['postId']);
            $post->body = $request['body'];
            if ($post ->update()) {
                return $post;
            }
            else{
                return null;
            }
        }
    
        public function find($id)
        {
                return Post::find($id);
        }
        
        public function findBy($att, $column)
        {
                return Post::where($att, $column);
        }
}
?>
