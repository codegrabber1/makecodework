<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;
use App\Repositories\ThemePostRepository;
use App\Repositories\TutorialCategoryRepository;

class BlogController extends Controller
{
	private $tutorialCategoryRepository;
	private $blogCategoryRepository;
	private $postTutorialCategoryRepository;
	private $blogPostsRepository;


	/**
	 * ThemeCategoriesController constructor.
	 */
	public function __construct() {
		$this->tutorialCategoryRepository = app(TutorialCategoryRepository::class);
		$this->blogCategoryRepository = app(CategoryRepository::class);
		$this->postTutorialCategoryRepository = app(ThemePostRepository::class);
		$this->blogPostsRepository = app(PostRepository::class);
	}

	public function __invoke(){
		$blogCategories = $this->blogCategoryRepository->getForFrontEnd();
		$tutorialCategories = $this->tutorialCategoryRepository->getForSelect();
		$lastPosts = $this->blogPostsRepository->getLastPosts(2);
		
    	return view(env('THEME').'/blog/blog', compact('blogCategories', 'tutorialCategories', 'lastPosts'));
	}
}
                                                                         