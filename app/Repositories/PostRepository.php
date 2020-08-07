<?php
namespace App\Repositories;

use App\Models\BlogPosts as Model;

class PostRepository extends BaseRepository {

	protected $model;
	/**
	 * @return mixed
	 */
	protected function getModel() {
		 return Model::class;
	}

	public function getAllPosts($is_published){
		$columns = [];

		$result = $this
			->startConditions()
			->select("*")
			->where('is_published', $is_published)
			->get();
		return $result;
	}


	public function getEdit($id){
		return $this->startConditions()->find($id);
	}
}