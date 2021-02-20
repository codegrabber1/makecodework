<?php

namespace App\Http\Controllers\Admin\Portfolio;

use App\Http\Controllers\Admin\BaseController;
use App\Models\Portfolio;
use App\Repositories\PortfolioCategoryRepository;
use App\Repositories\PortfolioRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class PortfolioController extends BaseController
{

	private $portfolioRepository;
	private $portfolioCategoryRepository;

	/**
	 * PortfolioController constructor.
	 */
	public function __construct() {
		parent::__construct();
		$this->portfolioRepository = app(PortfolioRepository::class);
		$this->portfolioCategoryRepository = app(PortfolioCategoryRepository::class);
	}

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //file:///Users/beon/Downloads/templates/Admin/Aero-Bootstrap-4x-Admin-Template/file-images.html
	    $items = $this->portfolioRepository->getAllItems();
	    $pc_cats = $this->portfolioCategoryRepository->getAllItems();
    	return view('admin.portfolio.portfolio', compact('items','pc_cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = new Portfolio();
        $categories = $this->portfolioCategoryRepository->getForSelect();
    	return view('admin.portfolio.portfolio-edit', compact('items', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        if(empty($data['slug'])){
        	$data['slug'] = Str::of($data['title'])->slug("-");
        }

        if(isset($data['img'])){
        	$data['img'] = $request->file('img')->getClientOriginalName();
        	$path = env( 'THEME').'/images/portfolio';
        	$request->img->move($path, $data['img']);
        }
        $item = (new Portfolio())->create($data);
	    return $item ? redirect()
		    ->route('admin.portfolio.index', [$item->id])
		    ->with(['success' => 'Item has ben created successfully']) : back()
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
	    $items = $this->portfolioRepository->getEdit($id);
	    $categories = $this->portfolioCategoryRepository->getForSelect();
    	return view('admin.portfolio.portfolio-edit', compact('items', 'categories'));
    }

	/**
	 * Store images from articles CKEditor.
	 *
	 * @param Request $request
	 *
	 */
	public function upload(Request $request){
		try {
			$this -> validate( request(), [
				'upload' => 'required|mimes:jpeg,png,bmp',
			] );
		} catch ( ValidationException $e ) {
		}
		if($request->hasFile('upload')) {

			//get filename with extension
			$filenamewithextension = $request->file('upload')->getClientOriginalName();

			//get filename without extension
			$filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

			//get file extension
			$extension = $request->file('upload')->getClientOriginalExtension();

			//filename to store
			$filenametostore = $filename.'_'.time().'.'.$extension;
			$year = Carbon::now()->year;
			//Upload File
			$path = env('THEME')."/images/portfolio/{$year}/";

			if(file_exists($path . $filenametostore)) {
				$filenametostore = Carbon::now()->timestamp . $filenametostore;
			}
			$request->file('upload')->move(public_path($path), $filenametostore);

			$CKEditorFuncNum = $request->input('CKEditorFuncNum');
			$url = asset($path.$filenametostore);

			$msg = 'Image successfully uploaded';
			$re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

			// Render HTML output
			@header('Content-type: text/html; charset=utf-8');
			echo $re;
		}
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
	    $items = $this->portfolioRepository->getEdit($id);
	    $data = $request->all();

	    if(empty($data['slug'])){
	    	$data['slug'] = Str::of($data['title'])->slug("-");
	    }

	    if(isset($data['img'])){
		    $data['img'] = $request->file('img')->getClientOriginalName();
		    $path = env('THEME') . '/images/portfolio';
		    $request->img->move($path, $data['img']);
	    }


	    $result = $items->update($data);

	    return $result ? redirect()
		    ->route('admin.portfolio.index', $items->id)
		    ->with(['success'=> 'The item ' . $items->title . ' updated successfully'] ) : back()
	        ->withErrors(['msg' => 'Not updated'] )
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
        dd(__METHOD__, $id);
    }
}
