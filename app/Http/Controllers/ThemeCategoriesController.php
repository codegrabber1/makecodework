<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;
use App\Repositories\SettingRepository;
use App\Repositories\ThemePostRepository;
use App\Repositories\TutorialCategoryRepository;

class ThemeCategoriesController extends Controller
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


	public function __invoke($id){

		$blogCategories = $this->blogCategoryRepository->getForFrontEnd();
		$settings = $this->settingRepository->getSettings();
		$tutorialCategories = $this->tutorialCategoryRepository->getAllItemsForFrontend(1,$id);
		$lastPosts = $this->postsRepository->getLastPosts(3);
		

		return view(env('THEME').'/tutorials',
			compact('blogCategories','tutorialCategories','lastPosts', 'settings'));
	}

}
