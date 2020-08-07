<?php
namespace App\Repositories;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository {

	/**
	 * @var Application|mixed
	 */
	protected $model;

	public function __construct()
	{
		$this->model = app($this->getModel());
	}

	/**
	 * @return mixed
	 */

	abstract protected function getModel();

	/**
	 * @return Application|Model|mixed
	 */
	protected function startConditions(){

		return clone $this->model;
	}

	/**
	 * @return mixed
	 */
	public function get()
	{
		$builder = $this->model->select('*');

		return $builder->get();
	}
}