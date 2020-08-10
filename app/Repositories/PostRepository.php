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

	public function getAllPosts($countPge = null, $published = null, $unpublished = null){
		$columns = [
			'id', 'blog_category_id', 'user_id', 'bc_title',  'slug', 'bc_keyword','bc_description', 'bc_excerpt',
			'bc_text', 'bc_image', 'is_published'
		];

		$result = $this
			->startConditions()
			->select($columns)
			->where('is_published', $published)
			->orWhere('is_published', $unpublished)
			->paginate($countPge);
		return $result;
	}


	public function getEdit($id){
		return $this->startConditions()->find($id);
	}
}