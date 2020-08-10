<?php

namespace App\Http\Controllers\Admin\Tutorials;

use App\Http\Controllers\Controller;
use App\Models\ThemeCategories;
use App\Repositories\ThemeRepository;
use App\Repositories\TutorialCategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

	private $tutorialsCategoryRepository;
	private $tutorialsThemeRepository;


	public function __construct() {
		$this->tutorialsCategoryRepository = app(TutorialCategoryRepository::class);
		$this->tutorialsThemeRepository = app(ThemeRepository::class);
	}

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->tutorialsCategoryRepository->getAllItems();
        $themes = $this->tutorialsThemeRepository->getForSelect();
    	return view('admin.tutorials.category', compact('categories', 'themes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new ThemeCategories();
	    $themes = $this->tutorialsThemeRepository->getForSelect();
	    return view('admin.tutorials.category-edit', compact('item', 'themes'));
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 *
	 * @return void
	 */
    public function store(Request $request)
    {
        $data = $request->all();

        if(empty($data['slug'])){
        	$data['slug'] = Str::of($data['th_cat_name'])->slug("-");
        }

        if(isset($data['th_cat_img'])){
	        $data['th_cat_img'] = $request->file('th_cat_img')->getClientOriginalName();
	        $path = env('THEME').'/images/themes';
	        $request->th_cat_img->move($path, $data['th_cat_img']);
        }

        $result = (new ThemeCategories())->create($data);

        return $result ? redirect()
	        ->route('admin.tutorials.category.index', [$result->id])
	        ->with(['success' => 'Category has been created successfully']) : back()
	        ->withErrors(['msg' => 'Not stored'])
	        ->withInput();
    }

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return void
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
        $item = $this->tutorialsCategoryRepository->getEdit($id);
	    $themes = $this->tutorialsThemeRepository->getForSelect();
    	return view('admin.tutorials.category-edit', compact('item', 'themes'));
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
	    $item = $this->tutorialsCategoryRepository->getEdit($id);

	    $data = $request->all();
	    if(empty($data['slug'])){
		    $data['slug'] = Str::of($data['th_cat_name'])->slug("-");
	    }

	    if(isset($data['th_cat_img'])){
		    $data['th_cat_img'] = $request->file('th_cat_img')->getClientOriginalName();
		    $path = env('THEME').'/images/themes';
		    $request->th_cat_img->move($path, $data['th_cat_img']);
	    }

	    $result = $item->update($data);

	    return $result ? redirect()
		    ->route('admin.tutorials.category.index', [$item->id])
		    ->with(['success' => 'Category '.$item->th_cat_name.' has been updated successfully']) : back()
		    ->withErrors(['msg' => 'Not stored'])
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
	    $item = $this->tutorialsCategoryRepository->getEdit($id);

	    if(isset($item->theme_image)) {
		    $path = env('THEME').'/images/themes/';
		    unlink(public_path($path.$item->theme_image));
	    }

	    $result = ThemeCategories::destroy($id);

	    return $result ? redirect()
		    ->route('admin.tutorials.index')
		    ->with(['success' => "Category with id-[$id] deleted successfully"]) : back()
		    ->withErrors(['msg' => 'Not deleted']);

    }
}
