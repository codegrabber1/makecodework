<?php

namespace App\Http\Controllers\Admin\Tutorials;

use App\Http\Controllers\Admin\BaseController;
use App\Models\Themes;
use App\Repositories\ThemeRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ThemeController extends BaseController
{
    private $themeRepository;

    public function __construct() {
    	parent::__construct();
    	$this->themeRepository = app(ThemeRepository::class);
    }

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $themes = $this->themeRepository->getAllThemes(0, 1);
        return view('admin.tutorials.theme', compact('themes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new Themes();
        $themes = $this->themeRepository->getForSelect();
        return view('admin.tutorials.theme-edit', compact('item', 'themes'));

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


	    if(empty($data['slug'])) {
		    $data['slug'] = Str::of($data['theme_name'])->slug("-");
	    }

	    if(isset($data['theme_image'])){

		    $data['theme_image'] = $request->file('theme_image')->getClientOriginalName();
		    $path = env('THEME').'/images/themes';
		    $request->theme_image->move($path, $data['theme_image']);
	    }
	    
	    $item = (new Themes())->create($data);

	    return $item ? redirect()
		    ->route('admin.tutorials.theme.index', [$item->id])
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
        $item = $this->themeRepository->getEdit($id);
        
	    return view('admin.tutorials.theme-edit', compact('item'));
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
	    $item = $this->themeRepository->getEdit($id);

	    $data = $request->all();

	    if(isset($data['theme_image'])){

		    $data['theme_image'] = $request->file('theme_image')->getClientOriginalName();
		    $path = env('THEME').'/images/themes';
		    $request->theme_image->move($path, $data['theme_image']);
	    }

	    $result = $item->update($data);

	    return $result ? redirect()
		    ->route('admin.tutorials.theme.index', $item->id)
		    ->with(['success' => 'Theme '. $item->theme_name . ' Updated successfully']) : back()
		    ->withErrors(['msg' => 'Not updated'])
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
	    $item = $this->themeRepository->getEdit($id);

	    if(isset($item->theme_image)) {
		    $path = env('THEME').'/images/themes/';
		    unlink(public_path($path.$item->theme_image));
	    }

	    $result = Themes::destroy($id);

	    return $result ? redirect()
		    ->route('admin.tutorials.theme.index')
		    ->with(['success' => "Item with id-[$id] deleted successfully"]) : back()
		    ->withErrors(['msg' => 'Not deleted']);

    }
    
}
