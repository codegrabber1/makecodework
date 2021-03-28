<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\ThemePost;
use Illuminate\Http\Request;

class SearchController extends BaseController
{
    public function index(Request $request){
	    $request->validate([
	    	's' => 'required'
	    ]);

	    $s = $request->s;

	    $posts = BlogPost::where("bc_title", "Like", "%{$s}%")->paginate(6);
	    $cats = ThemePost::where("p_title", "Like", "%{$s}%")->paginate(6);

	    return view(env('THEME').'/search', compact('posts', 'cats', 's'));

    }
}
