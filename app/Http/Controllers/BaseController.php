<?php

namespace App\Http\Controllers;

class BaseController extends Controller
{
    protected $template;
    protected $vars = array ();

	public function __construct() {

    }

    protected function renderOut(){


		return view($this->template)->with($this->vars);
    }
}
