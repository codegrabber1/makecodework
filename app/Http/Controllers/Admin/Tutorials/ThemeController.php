<?php

namespace App\Http\Controllers\Admin\Tutorials;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Themes as Model;
use Illuminate\Support\Str;

class ThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

	    $themes = (new Model())::all();
	    
    	return view('admin.tutorials.theme', compact('themes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$themes = new Model();
		
    	return view('admin.tutorials.theme-edit', compact('themes'));
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

	    if(empty($data['slug'])) {
		    $data['slug'] = Str::of($data['theme_name'])->slug('-');
	    }

	    $result = (new Model())->create($data);

	    return $result ? redirect()
		    ->route('admin.theme.tutorials.index', [$result->id])
		    ->with(['success' => 'Item has been created successfully']) : back()
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

    	$themes = (new Model())->find($id);
    	return view('admin.tutorials.theme-edit', compact('themes'));
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
        $item = (new Model())->find($id);
	    $data = $request->all();

	    $result = $item->update($data);

	    return $result ? redirect()
		    ->route('admin.theme.tutorials.index', $item->id)
		    ->with(['success' => 'Updated successfully']) : back()
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
        //
    }
}
