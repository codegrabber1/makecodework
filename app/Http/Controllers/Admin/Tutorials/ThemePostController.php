<?php

namespace App\Http\Controllers\Admin\Tutorials;

use App\Http\Controllers\Admin\BaseController;
use App\Models\ThemePosts as Model;

use App\Repositories\ThemePostRepository;
use App\Repositories\TutorialCategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ThemePostController extends BaseController
{

	private $themePostRepository;
	private $themeCategoryRepository;

	public function __construct(){
		parent::__construct();
		$this->themePostRepository = app(ThemePostRepository::class);
		$this->themeCategoryRepository = app(TutorialCategoryRepository::class);
	}
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

	    $posts = $this->themePostRepository->getAllPosts(6, 0, 1);
	    
    	return view('admin.tutorials.theme-post', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$themes = new Model();
		$categories = $this->themeCategoryRepository->getForSelect();
		
    	return view('admin.tutorials.theme-post-edit', compact('themes', 'categories'));
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
	    
	    if(empty($data['p_slug'])) {
		    $data['p_slug'] = Str::of($data['p_title'])->slug('-');
	    }

	    if(isset($data['p_image'])){

		    $data['p_image'] = $request->file('p_image')->getClientOriginalName();
		    $path = env('THEME').'/images/themes';
		    $request->p_image->move($path, $data['p_image']);
	    }

	    $data['p_excerpt'] = Str::limit($data['p_text'], 200, ' ...');

	    $result = (new Model())->create($data);

	    return $result ? redirect()
		    ->route('admin.tutorials.post.index', [$result->id])
		    ->with(['success' => 'Item has been created successfully']) : back()
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

    	$themes = $this->themePostRepository->getEdit($id);
	    $categories = $this->themeCategoryRepository->getForSelect();
    	return view('admin.tutorials.theme-post-edit', compact('themes', 'categories'));
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
        $item = $this->themePostRepository->getEdit($id);
	    $data = $request->all();

	    $result = $item->update($data);

	    return $result ? redirect()
		    ->route('admin.tutorials.post.index', $item->id)
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
        $item = $this->themePostRepository->getEdit($id);
	    if(isset($data['p_image'])){

		    $path = env('THEME').'/images/themes';
		    unlink(public_path($path.$item['p_image']));
	    }

	    $result = ThemePosts::destroy($id);

	    return $result ? redirect()
		    ->route('admin.tutorials.post.index')
		    ->with(['success' => "Item with id-[$id] deleted successfully"]) : back()
		    ->withErrors(['msg' => 'Not deleted']);

    }
}
