<?php
namespace App\Web\Controllers;

use App\Post;
use App\PostComment;
use App\Web\WebController;
use Illuminate\Http\Request;

class PostController extends WebController {

    public function get(){
        $posts = Post::get();
        return view('web.index', ['posts' => $posts]);
    }

    public function post(Request $request){

        $requestParams = $request->only(['image','title', 'description']);
        $post = new Post();
        if ($request->file('image')) {
            $imageFile = $request->file('image');
            try {
                $destinationPath = storage_path('images/post');
                if (!is_dir($destinationPath)) {
                    mkdir($destinationPath, 0777, true);
                    chmod($destinationPath, 0777);
                }
                $fileName = str_random(6) . time() . "." . $imageFile->getClientOriginalExtension();
                $imageFile->move($destinationPath, $fileName);
                $post->image = $fileName;
            } catch (\Exception $e) {
                \Response::json(['Error on image upload.'], 400)->send();
            }
        }
        $post->user_id = WebController::$users->id;
        $post->title = $requestParams['title'];
        $post->description = $requestParams['description'];
        $post->save();
        return redirect('/');
    }

    public function detail($id){
        $post = Post::find($id);
        if(!$post) \Response::json(['Post not found.'], 400)->send();

        //Get post comment
        $postComments = PostComment::with('user')->wherePostId($post->id)->get();
        return view('web/post.detail', ['post' => $post, 'postComments' => $postComments]);
    }

    public function postComment(Request $request){

        $requestParams = $request->only(['post_id','comment']);
        $postComment = new PostComment();
        $postComment->user_id = WebController::$users->id;
        $postComment->post_id = $requestParams['post_id'];
        $postComment->comments = $requestParams['comment'];
        $postComment->save();
        return redirect('/post/'.$requestParams['post_id']);
    }

    public function deleteComment($postId, $id){
        PostComment::whereId($id)->delete();
        return redirect('/post/'.$postId);
    }
}