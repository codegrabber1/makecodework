<?php

namespace App\Http\Controllers;
use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;
use App\Repositories\TutorialCategoryRepository;

class HomeController extends Controller
{
	private $tutorialsCategoryRepository;
	private $blogCategoryRepository;
	private $postsRepository;

	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->tutorialsCategoryRepository = app(TutorialCategoryRepository::class);
	    $this->postsRepository = app(PostRepository::class);
        $this->blogCategoryRepository = app(CategoryRepository::class);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

    	$tutorialsCategory= $this->tutorialsCategoryRepository->getAllItems();
    	$blogCategory= $this->blogCategoryRepository->getAllItems();
	    $lastPosts = $this->postsRepository->getLastPosts(3);
    	return view('admin.home', compact('tutorialsCategory', 'blogCategory','lastPosts'));
    }
}
