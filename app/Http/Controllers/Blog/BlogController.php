<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\BaseController;
use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;
use App\Repositories\SettingRepository;
use App\Repositories\ThemePostRepository;
use App\Repositories\TutorialCategoryRepository;

class BlogController extends BaseController
{
	private $tutorialCategoryRepository;
	private $blogCategoryRepository;
	private $settingRepository;
	private $postTutorialCategoryRepository;
	private $blogPostsRepository;


	/**
	 * ThemeCategoriesController constructor.
	 */
	public function __construct() {
		$this->tutorialCategoryRepository = app(TutorialCategoryRepository::class);
		$this->blogCategoryRepository = app(CategoryRepository::class);
		$this->settingRepository = app(SettingRepository::class);
		$this->postTutorialCategoryRepository = app(ThemePostRepository::class);
		$this->blogPostsRepository = app(PostRepository::class);
	}

	public function __invoke(){
		$blogCategories = $this->blogCategoryRepository->getForFrontEnd();
		$settings = $this->settingRepository->getSettings();
		$tutorialCategories = $this->tutorialCategoryRepository->getForSelect();
		$lastPosts = $this->blogPostsRepository->getLastPosts(2);
		
    	return view(env('THEME').'/blog/blog', compact(
    		'blogCategories', 'tutorialCategories', 'lastPosts', 'settings'));
	}
}
                                                                         