<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Admin\BaseController;

use App\Models\BlogCategories;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends BaseController
{
    private $blogCategoryRepository;

	public function __construct() {
		$this->blogCategoryRepository = app(CategoryRepository::class);
	}

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->blogCategoryRepository->getAllItems();
        
    	return view('admin.blog.category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new BlogCategories();
        
        return view('admin.blog.category-edit', compact('item'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	    $data = $request->input();

	    if(empty($data['slug'])) {
		    $data['slug'] = Str::of($data['bc_name'])->slug('-');
	    }
	    
	    $result = (new BlogCategories())->create($data);

	    return $result ? redirect()
		    ->route('admin.categories.index', [$result->id])
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$item = $this->blogCategoryRepository->getEdit($id);

	    return view('admin.blog.category-edit', compact('item'));
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
	    $item = $this->blogCategoryRepository->getEdit($id);

	    $data = $request->all();
	    
	    if(empty($data['slug'])) {
		    $data['slug'] = Str::of($data['bc_name'])->slug('-');
	    }
	    $result = $item->update($data);

	    return $result ? redirect()
		    ->route('admin.categories.index', $item->id)
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
        
    	$item = $this->blogCategoryRepository->getEdit($id);

        $result =  BlogCategories::destroy($id);

	    return $result ? redirect()
		    ->route('admin.categories.index')
		    ->with(['success' => "Category with id-[$id] deleted successfully"]) : back()
		    ->withErrors(['msg' => 'Not deleted']);
    }
}
