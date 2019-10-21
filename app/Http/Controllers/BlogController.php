<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class BlogController extends Controller
{
   

    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }


    public function index()
    {
        $posts = $this->post->all();


        return response()->json($posts);
    }

  
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
         $this->post->create($request->all());

         return response()->json(["success" => "Blog created with success"]);
    }

 
    public function show($id)
    {
        $post =  $this->post->find($id);

         return response()->json($post);
    }

    
    public function edit($id)
    {
        //
    }

  
    public function update(Request $request, $id)
    {
        $post = $this->post->find($id);

        $post->update($request->all());

        return response()->json(['success' => "Post updated  with success"]);
    }

    public function destroy($id)
    {
         $post = $this->post->find($id);

         $post->delete();

         return response()->json(["success" => "Post deleted with success"]);
    }

    public function addComment($id, Request $request)
    {
        $post = $this->post->find($id);

        $post->comments()->create($request->all());

        return response()->json(['success' => "Comment created  with success"]);
    }


    public function showComment($id)
    {
         $comments = $this->post->find($id)->comments()->get();

         return response()->json($comments);
    }

    public function updateComment($id, $comment, Request $request)
    {
        $post = $this->post->find($id);

        $comment =  $post->comments()->find($comment);

        $comment->update($request->all());

        return response()->json(['success' => 'Comment updated with success']);

    }

    public function deleteComment($id, $comment)
    {
        $post = $this->post->find($id);

        $comment = $post->comments()->find($comment);

        $comment->delete();

        return response()->json(['success' => "Comment deleted with success"]);
    }
}
