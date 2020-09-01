<?php
/**
 * Created by PhpStorm.
 * User: beon
 * Date: 29.08.2020
 * Time: 19:31
 */

namespace App\Repositories;
use App\Models\BlogPostsComment as Model;

class BlogCommentRepository extends BaseRepository {

	protected $model;

	/**
	 * @return mixed
	 */
	protected function getModel() {
		return Model::class;
	}

	public function getAllPostComments($countComments = null){
		$columns = [];

		$result = $this
			->startConditions()
			->select("*")
			->paginate($countComments);

		return $result;
	}

	public function getEdit($id){
	return	$this->startConditions()->find($id);
	}
}