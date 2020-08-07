<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Models\Role;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

	public function __construct(){
		$this->middleware('auth');
	}
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
    	return view( 'admin.users.index', compact('users') );
    }


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$user = new User();
		$roles = $roles = Role::all();
		return view('admin.users.edit', compact('user', 'roles'));
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

		$user = User::create([
			'name' => $data['name'],
			'email' => $data['email'],
			'password' => Hash::make($data['password']),
		]);

		$role = Role::select('id')->where('name', 'user')->first();

		$user->roles()->attach($role);

		return $user ? redirect()
			->route('admin.users.index', [$user->id])
			->with(['success' => 'Item has ben created successfully']) : back()
			->withErrors(['msg' => 'Not stored'])
			->withInput();
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if(Gate::denies('edit-users')){
            return redirect(route('admin.users.index'));
        }    
        $roles = Role::all();

    	return view('admin.users.edit')->with([
            'user' => $user,
            'roles' => $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {   
        $user->roles()->sync($request->roles);
        $user->name = $request->name;
        $user->email = $request->email;
        
        if($user->save()) {
            $request->session()->flash('success', $user->name .' has been updated');
        } else {
            $request->session()->flash('error', 'There was an error updating the user');
        }

        

        return redirect()->route('admin.users.index');
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\User $user
	 *
	 * @return \Illuminate\Http\Response
	 * @throws \Exception
	 */
    public function destroy(User $user)
    {
        if(Gate::denies('delete-users')){
            return redirect(route('admin.users.index'));
        } 
        
        $user->roles()->detach();
        $user->delete();

	    return redirect()->route('admin.users.index');
    }
}
