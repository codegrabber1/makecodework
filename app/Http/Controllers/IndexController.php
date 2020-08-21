<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;
use App\Repositories\ThemeRepository;
use App\Repositories\TutorialCategoryRepository;
use Illuminate\Http\Request;

class IndexController extends Controller
{

	private $themeRepository;
	private $postsRepository;
	private $blogCategoryRepository;
	private $tutorialCategoryRepository;

	public function __construct() {
		$this->themeRepository = app(ThemeRepository::class);
		$this->postsRepository = app(PostRepository::class);
		$this->blogCategoryRepository = app(CategoryRepository::class);
		$this->tutorialCategoryRepository = app(TutorialCategoryRepository::class);
	}

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $themes = $this->themeRepository->getForMain();
        $lastPosts = $this->postsRepository->getLastPosts(2);
        $blogCategories = $this->blogCategoryRepository->getForFrontEnd();
        $tutorialCategories = $this->tutorialCategoryRepository->getForSelect();

    	return view(env('THEME').'/index', compact('themes',
		        'lastPosts', 'tutorialCategories', 'blogCategories'));
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
