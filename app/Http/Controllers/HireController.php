<?php

namespace App\Http\Controllers;

use App\Models\Hire;
use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;
use App\Repositories\SettingRepository;
use App\Repositories\TutorialCategoryRepository;
use Illuminate\Http\Request;

class HireController extends Controller
{

	private $tutorialCategoryRepository;
	private $blogCategoryRepository;
	private $settingRepository;
	private $postsRepository;

	/**
	 * ThemeCategoriesController constructor.
	 */
	public function __construct() {
		$this->tutorialCategoryRepository = app(TutorialCategoryRepository::class);
		$this->blogCategoryRepository = app(CategoryRepository::class);
		$this->settingRepository = app(SettingRepository::class);
		$this->postsRepository = app(PostRepository::class);
	}
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $blogCategories = $this->blogCategoryRepository->getForFrontEnd();
	    $settings = $this->settingRepository->getSettings();
	    $tutorialCategories = $this->tutorialCategoryRepository->getForSelect();
	    $lastPosts = $this->postsRepository->getLastPosts(3);

	    return view(env('THEME').'.hire', compact('blogCategories','tutorialCategories','lastPosts', 'settings'));
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
        $data = $request->all();

        $item = (new Hire()) ->create($data);
        
	    return $item ? redirect()
		    ->route('hireme.index', [$item->id])
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
