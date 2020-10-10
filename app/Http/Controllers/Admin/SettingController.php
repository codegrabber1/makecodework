<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\SettingRepository;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class SettingController extends BaseController
{

	private $settingRepository;

	public function __construct() {
		parent::__construct();
		$this->settingRepository = app(SettingRepository::class);
	}

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$items = $this->settingRepository->getSettings();
//	    $items = new Setting();
	    
	    return view('.admin.settings', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = new Setting();
        return view('admin.settings-edit', compact('items'));

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

	    if(isset($data['logo'])){

		    $data['logo'] = $request->file('logo')->getClientOriginalName();
		    $path = env('THEME').'/images/';
		    $request->logo->move($path, $data['logo']);
	    }
	    $item = (new Setting())->create($data);

	    return $item ? redirect()
		    ->route('admin.settings.index', [$item->id])
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
	    $items = $this->settingRepository->getEdit($id);

	    return view('admin.settings-edit', compact('items'));
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
	    $item = $this->settingRepository->getEdit($id);
	    $data = $request->all();
	    
	    if(isset($data['logo'])){

		    $data['logo'] = $request->file('logo')->getClientOriginalName();
		    $path = env('THEME').'/images/';
		    $request->logo->move($path, $data['logo']);
	    }
	    
//	    $data['bc_excerpt'] = Str::limit($data['bc_text'], 200, ' ...');

	    $result = $item->update($data);

	    return $result ? redirect()
		    ->route('admin.settings.index', $item->id)
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
