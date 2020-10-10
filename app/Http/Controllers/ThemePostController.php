<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;
use App\Repositories\SettingRepository;
use App\Repositories\ThemePostRepository;
use App\Repositories\TutorialCategoryRepository;

class ThemePostController extends Controller
{

	private $tutorialCategoryRepository;
	private $blogCategoryRepository;
	private $settingRepository;
	private $postTutorialCategoryRepository;
	private $postsRepository;


	/**
	 * ThemeCategoriesController constructor.
	 */
	public function __construct() {
		$this->tutorialCategoryRepository = app(TutorialCategoryRepository::class);
		$this->blogCategoryRepository = app(CategoryRepository::class);
		$this->settingRepository = app(SettingRepository::class);
		$this->postTutorialCategoryRepository = app(ThemePostRepository::class);
		$this->postsRepository = app(PostRepository::class);
	}
	public function __invoke($id){
		$blogCategories = $this->blogCategoryRepository->getForFrontEnd();
		$settings = $this->settingRepository->getSettings();
		$tutorialCategories = $this->tutorialCategoryRepository->getAllItemsForFrontend(6,$id);
		$lastPosts = $this->postsRepository->getLastPosts(6);
		$getPost = $this->postTutorialCategoryRepository->getEdit($id);

		return view(env('THEME').'/tutorials-post', compact(
			'blogCategories', 'tutorialCategories','getPost', 'lastPosts', 'settings'));
    }
}
