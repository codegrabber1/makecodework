<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;
use App\Repositories\SettingRepository;
use App\Repositories\ThemePostRepository;
use App\Repositories\TutorialCategoryRepository;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
	private $tutorialCategoryRepository;
	private $blogCategoryRepository;
	private $settingRepository;
	private $postTutorialCategoryRepository;
	private $blogPostsRepository;
	private $postsRepository;

	public function __construct(){

		$this->tutorialCategoryRepository = app(TutorialCategoryRepository::class);
		$this->blogCategoryRepository = app(CategoryRepository::class);
		$this->settingRepository = app(SettingRepository::class);
		$this->postTutorialCategoryRepository = app(ThemePostRepository::class);
		$this->postsRepository = app(PostRepository::class);
		$this->blogPostsRepository = app(PostRepository::class);
	}
	public function __invoke($id){
		$blogCategories = $this->blogCategoryRepository->getForFrontEnd();
		$tutorialCategories = $this->tutorialCategoryRepository->getForSelect();
		$lastPosts = $this->postsRepository->getLastPosts(4);
		$settings = $this->settingRepository->getSettings();
		$blogPost = $this->blogPostsRepository->getEdit($id);
		return view(env('THEME').'/blog/blog-post', compact(
			'blogCategories', 'tutorialCategories', 'blogPost','lastPosts', 'settings'));
	}
}
