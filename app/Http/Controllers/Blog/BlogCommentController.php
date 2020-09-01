<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\BlogPostsComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Response;

class BlogCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\Response
	 * @throws \Throwable
	 */
    public function store(Request $request)
    {
	    
    	$data = $request->except('_token', 'comment_post_ID', 'comment_parent');
	    $data['blog_post_id'] = $request->input('comment_post_ID');
	    $data['parent_id'] = $request->input('comment_parent');

	    
	    $validator = Validator::make($data,[

		    'blog_post_id' => 'integer|required',
		    'parent_id' => 'integer|required',
		    'comment_text' => 'string|required'

	    ]);

	    $validator->sometimes(['author_name','author_email'],'required|max:255',function($input) {

		    return !Auth::check();

	    });

	    if($validator->fails()) {
		    return Response::json(['error'=>$validator->errors()->all()]);
	    }

	    $user = Auth::user();
	    
	    $comment = new BlogPostsComment($data);

	    if($user) {
		    $comment->user_id = $user->id;
	    }
	    

	    $post = BlogPost::find($data['blog_post_id']);


	    $comment->load('user');
	    
	    $post->comments()->save($comment);


	    $data['id'] = $comment->id;

	    $data['author_email'] = (!empty($data['author_email'])) ? $data['author_email'] : $comment->user->email;
	    $data['author_name'] = (!empty($data['author_name'])) ? $data['author_name'] : $comment->user->name;
	           
	    $data['hash'] = md5($data['author_email']);

	    $view_comment = view(env('THEME').'.blog.content_one_comment')->with('data',$data)->render();

	    return Response::json(['success' => TRUE,'comment_text'=>$view_comment,'data' => $data]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
