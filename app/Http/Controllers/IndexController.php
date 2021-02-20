<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;
use App\Repositories\PortfolioRepository;
use App\Repositories\PostRepository;
use App\Repositories\SettingRepository;
use App\Repositories\ThemeRepository;
use App\Repositories\TutorialCategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class IndexController extends BaseController
{

	private $themeRepository;
	private $postsRepository;
	private $settingRepository;
	private $blogCategoryRepository;
	private $tutorialCategoryRepository;
	private $portfolioRepository;
	private $portfolioCategoryRepository;

	public function __construct() {
		parent::__construct();
		$this->themeRepository = app(ThemeRepository::class);
		$this->postsRepository = app(PostRepository::class);
		$this->settingRepository = app(SettingRepository::class);
		$this->blogCategoryRepository = app(CategoryRepository::class);
		$this->tutorialCategoryRepository = app(TutorialCategoryRepository::class);
		$this->portfolioRepository = app(PortfolioRepository::class);

		$this->template = env("THEME").'.index';
	}

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $themes = $this->themeRepository->getForMain();
	    $settings = $this->settingRepository->getSettings();
        $lastPosts = $this->postsRepository->getLastPosts(4);
        $blogCategories = $this->blogCategoryRepository->getForFrontEnd();
        $tutorialCategories = $this->tutorialCategoryRepository->getForSelect();
        $portfolioImages = $this->portfolioRepository->getItemsForIndex(8);

        $this->vars = Arr::add($this->vars, 'themes', $themes);
        $this->vars = Arr::add($this->vars, 'lastPosts', $lastPosts);
        $this->vars = Arr::add($this->vars, 'settings', $settings);
        $this->vars = Arr::add($this->vars, 'blogCategories', $blogCategories);
        $this->vars = Arr::add($this->vars, 'tutorialCategories',  $tutorialCategories);
        $this->vars = Arr::add($this->vars, 'portfolioImages', $portfolioImages);

		return $this->renderOut();
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
