<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;
use App\Repositories\ThemePostRepository;
use App\Repositories\TutorialCategoryRepository;

class ThemePostController extends Controller
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

		$getPost = $this->postTutorialCategoryRepository->getEdit($id);
		return view(env('THEME').'/tutorials-post', compact('blogCategories', 'tutorialCategories','getPost'));
    }
}
