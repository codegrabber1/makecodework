<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Admin\BaseController;
use App\Repositories\BlogCommentRepository;
use Illuminate\Http\Request;

class CommentController extends BaseController
{

	private $blogCommentRepository;

	public function __construct() {
		$this->blogCommentRepository = app(BlogCommentRepository::class);
	}

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    	$comments= $this->blogCommentRepository->getAllPostComments(6);

    	return view('admin.blog.comments', compact('comments'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
	    $item = $this->blogCommentRepository->getEdit($id);
	    

    	return view('admin.blog.comment-edit', compact('item'));
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
	    $item = $this->blogCommentRepository->getEdit($id);

	    $data = $request->all();

	    $result = $item->update($data);

	    return $result ? redirect()
		    ->route('admin.comments.index', $item->id)
		    ->with(['success' => 'Updated successfully']) : back()
		    ->withErrors(['msg' => 'Not updated'])
		    ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd($id);
    }
}
