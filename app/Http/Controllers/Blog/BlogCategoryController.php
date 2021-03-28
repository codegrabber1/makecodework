<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;
use App\Repositories\ThemePostRepository;
use App\Repositories\TutorialCategoryRepository;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
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

	public function __invoke($id){
		
	    $blogCategories = $this->blogCategoryRepository->getForFrontEnd();
	    $tutorialCategories = $this->tutorialCategoryRepository->getForSelect();

//		$allPosts = $this->getAllPosts($id);
		$allPosts = $this->blogPostsRepository->getPostsForCategory(6, $id);
		
		return view(env('THEME').'/blog/blog-category',
		    compact('blogCategories', 'tutorialCategories', 'allPosts'));
    }

	public function getAllPosts($id){

		$blogCategories = $this->blogCategoryRepository->getCatForPosts($id);
		
		foreach ($blogCategories as $category) {
			
			$allPosts = $this->blogPostsRepository->getPostsForCategory(6, $category->id);

			return $allPosts;
		}

	}
}
