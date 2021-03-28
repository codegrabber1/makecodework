<?php

namespace App\Http\Controllers;

use App\Models\ThemePost;
use App\Models\ThemePostsComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Response;

class ThemeCommentController extends Controller
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
	    $data['theme_post_id'] = $request->input('comment_post_ID');
	    $data['parent_id'] = $request->input('comment_parent');


	    $validator = Validator::make($data,[

		    'theme_post_id' => 'integer|required',
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
	    
	    $comment = new ThemePostsComment($data);
	    
	    if($user) {
		    $comment->user_id = $user->id;
	    }

		///dd($comment);

	    $post = ThemePost::find($data['theme_post_id']);

		$post->comments()->save($comment);

		$comment->load('user');


	    $data['id'] = $comment->id;

	    $data['author_email'] = (!empty($data['author_email'])) ? $data['author_email'] : $comment->user->email;
	    $data['author_name'] = (!empty($data['author_name'])) ? $data['author_name'] : $comment->user->name;

	    $data['hash'] = md5($data['author_email']);

	    $view_comment = view(env('THEME').'.content_one_comment')->with('data',$data)->render();

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
