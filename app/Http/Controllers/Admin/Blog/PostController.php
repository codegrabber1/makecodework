<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Admin\BaseController;
use App\Models\BlogPost;
use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends BaseController
{

	private $blogPostRepository;
	private $blogCategoryRepository;

	public function __construct() {
		parent::__construct();
		$this->blogPostRepository = app(PostRepository::class);
		$this->blogCategoryRepository = app(CategoryRepository::class);
	}

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->blogPostRepository->getAllPosts(6,1,0);
        $categories = $this->blogCategoryRepository->getAllItems();
    	return view('admin.blog.posts', compact('posts', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posts = new BlogPost();
	    $categories = $this->blogCategoryRepository->getAllItems();
    	return view('admin.blog.post-edit', compact('posts','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();


	    if(empty($data['slug'])) {
		    $data['slug'] = Str::of($data['bc_title'])->slug("-");
	    }

	    if(isset($data['bc_image'])){

		    $data['bc_image'] = $request->file('bc_image')->getClientOriginalName();
		    $path = env('THEME').'/images/blog';
		    $request->bc_image->move($path, $data['bc_image']);
	    }

	    $data['bc_excerpt'] = Str::limit($data['bc_text'], 200, ' ...');

	    $item = (new BlogPost()) ->create($data);

	    return $item ? redirect()
		    ->route('admin.posts.index', [$item->id])
		    ->with(['success' => 'Item has ben created successfully']) : back()
		    ->withErrors(['msg' => 'Not stored'])
		    ->withInput();
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
	    $posts=$this->blogPostRepository->getEdit($id);
    	$categories = $this->blogCategoryRepository->getAllItems();
	    return view('admin.blog.post-edit', compact('posts','categories'));
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
        $item = $this->blogPostRepository->getEdit($id);
        
    	$data = $request->all();

	    if(isset($data['bc_image'])){

		    $data['bc_image'] = $request->file('bc_image')->getClientOriginalName();
		    $path = env('THEME').'/images/blog';
		    $request->bc_image->move($path, $data['bc_image']);
	    }
	    
	    $data['bc_excerpt'] = Str::limit($data['bc_text'], 200, ' ...');

	    $result = $item->update($data);

	    return $result ? redirect()
		    ->route('admin.posts.index', $item->id)
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
	    $item = $this->blogPostRepository->getEdit($id);

	    if(isset($item->bc_image)) {
		    $path = env('THEME').'/images/blog/';
		    unlink(public_path($path.$item->bc_image));
	    }

	    $result = BlogPost::destroy($id);

	    return $result ? redirect()
		    ->route('admin.posts.index')
		    ->with(['success' => "Item with id-[$id] deleted successfully"]) : back()
		    ->withErrors(['msg' => 'Not deleted']);
    
    }
}
