<?php

namespace App\Http\Controllers\Admin\Tutorials;

use App\Http\Controllers\Controller;
use App\Models\ThemeCategories;
use App\Repositories\TutorialCategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

	private $tutorialsCategoryRepository;


	public function __construct() {
		$this->tutorialsCategoryRepository = app(TutorialCategoryRepository::class);
	}

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->tutorialsCategoryRepository->getAllItems();
    	return view('admin.tutorials.category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new ThemeCategories();
	    return view('admin.tutorials.category-edit', compact('item'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->input();
             dd($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = $this->tutorialsCategoryRepository->getEdit($id);
    	return view('admin.tutorials.category-edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
