<?php

namespace App\Http\Controllers;
use App\Repositories\TutorialCategoryRepository;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
	private $tutorialsCategoryRepository;
	private $blogCategoryRepository;

	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->tutorialsCategoryRepository = app(TutorialCategoryRepository::class);
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
    	return view('admin.home', compact('tutorialsCategory','blogCategory'));
    }
}
