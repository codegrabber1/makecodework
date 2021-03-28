<?php

namespace App\Http\Controllers\Admin\Portfolio;

use App\Http\Controllers\Admin\BaseController;
use App\Models\PortfolioCategory;
use App\Repositories\PortfolioCategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PortfolioCategoryController extends BaseController
{
	private $portfolioCategoryRepository;

	/**
	 * PortfolioCategoryController constructor.
	 */
	public function __construct() {
		parent::__construct();
		$this->portfolioCategoryRepository = app(PortfolioCategoryRepository::class);
	}

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    	$cats = $this->portfolioCategoryRepository->getAllItems();
    	return view('admin.portfolio.portfolio-category', compact( 'cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new PortfolioCategory();
    	
    	return view('admin.portfolio.portfolio-category-edit', compact(  'item'));
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
       
       if(empty($data['slug'])){
       	    $data['slug'] = Str::of($data['pc_name'])->slug("-");
       }
       $result = (new PortfolioCategory())->create($data);
       return $result ? redirect()
	       ->route( 'admin.portfolio.category.index', [$result->id])
	       ->with(['success' => 'Category has been created successfully']) : back()
	       ->withErrors(['msg' => 'Not stored'])
	       ->withInput();
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
        $item = $this->portfolioCategoryRepository->getEdit($id);
    	return view('admin.portfolio.portfolio-category-edit', compact('item'));
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
        $item = $this->portfolioCategoryRepository->getEdit($id);
    	$data = $request->input();
        if($data['slug']){
	        $data['slug'] = Str::of($data['pc_name'])->slug("-");
        }
        $result = $item->update($data);

        return $result ? redirect()
	        ->route('admin.portfolio.category.index', [$item->id])
	        ->with(['success' => 'Category '.$item->pc_name.' has been updated successfully']) : back()
	        ->withErrors( ['msg' => 'Error'])
	        ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

	    $result = PortfolioCategory::destroy( $id);

	    return $result ? redirect()
		    ->route( 'admin.portfolio.category.index')
		    ->with(['success' => "Category with id-[$id] deleted successfully"]) : back()
		    ->withErrors( ['msg' => 'Category not deleted']);
    }
}
