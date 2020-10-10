<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;
use App\Repositories\SettingRepository;
use App\Repositories\ThemePostRepository;
use App\Repositories\TutorialCategoryRepository;

class ThemeCategoryController extends Controller
{
	private $tutorialCategoryRepository;
	private $blogCategoryRepository;
	private $postTutorialCategoryRepository;
	private $settingRepository;
	private $postsRepository;


	/**
	 * ThemeCategoriesController constructor.
	 */
	public function __construct() {
		$this->tutorialCategoryRepository = app(TutorialCategoryRepository::class);
		$this->blogCategoryRepository = app(CategoryRepository::class);
		$this->postTutorialCategoryRepository = app(ThemePostRepository::class);
		$this->settingRepository = app(SettingRepository::class);
		$this->postsRepository = app(PostRepository::class);
	}
	
	public function __invoke($id){
		
		$blogCategories = $this->blogCategoryRepository->getForFrontEnd();
		$tutorialCategories = $this->tutorialCategoryRepository->getAllItemsForFrontend(6,$id);
		$settings = $this->settingRepository->getSettings();

		$lastPosts = $this->postsRepository->getLastPosts(3);
		$allPosts = $this->postTutorialCategoryRepository->getAllItemsForFrontend(3,$id);

    	return view(env('THEME').'/tutorials-category',
		    compact('blogCategories','tutorialCategories','tutorialCategories','allPosts','lastPosts', 'settings'));
	
    }

	public function getAllPosts($id){

		$tutorialCategories = $this->tutorialCategoryRepository->getAllItemsForFrontend($id);

		foreach ($tutorialCategories as $category) {

			$allPosts = $this->postTutorialCategoryRepository->getAllItemsForFrontend($category->id);

			return $allPosts;
		}

	}
}
