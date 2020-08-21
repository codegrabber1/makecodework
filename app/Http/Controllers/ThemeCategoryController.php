<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;
use App\Repositories\ThemePostRepository;
use App\Repositories\TutorialCategoryRepository;

class ThemeCategoryController extends Controller
{
	private $tutorialCategoryRepository;
	private $blogCategoryRepository;
	private $postTutorialCategoryRepository;


	/**
	 * ThemeCategoriesController constructor.
	 */
	public function __construct() {
		$this->tutorialCategoryRepository = app(TutorialCategoryRepository::class);
		$this->blogCategoryRepository = app(CategoryRepository::class);
		$this->postTutorialCategoryRepository = app(ThemePostRepository::class);
	}
	
	public function __invoke($id){
		$blogCategories = $this->blogCategoryRepository->getForFrontEnd();
		$tutorialCategories = $this->tutorialCategoryRepository->getAllItemsForFrontend($id);

		$allPosts = $this->postTutorialCategoryRepository->getAllItemsForFrontend($id);
		

    	return view(env('THEME').'/tutorials-category',
		    compact('blogCategories','tutorialCategories','tutorialCategories','allPosts'));
	
    }

	public function getAllPosts($id){

		$tutorialCategories = $this->tutorialCategoryRepository->getAllItemsForFrontend($id);

		foreach ($tutorialCategories as $category) {

			$allPosts = $this->postTutorialCategoryRepository->getAllItemsForFrontend($category->id);

			return $allPosts;
		}

	}
}
