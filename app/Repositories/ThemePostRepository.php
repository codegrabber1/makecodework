<?php
namespace App\Repositories;

use App\Models\ThemePost as Model;


class ThemePostRepository extends BaseRepository {


	protected $model;
	/**
	 * @return mixed
	 */
	protected function getModel() {
		return Model::class;
	}
	public function getAllPosts($countPge = null, $published = null, $unpublished = null){
		$columns = [
			'id', 'theme_category_id', 'user_id', 'p_title',  'p_slug', 'p_keywords','p_description', 'p_excerpt',
			'p_text', 'p_image', 'is_published'
		];

		$result = $this
			->startConditions()
			->select($columns)
			->where('is_published', $published)
			->orWhere('is_published', $unpublished)
			->paginate($countPge);
		return $result;
	}

	public function getAllItemsForFrontend($countPost = null, $id){
		$columns = ['id','p_title', 'user_id', 'p_image', 'p_excerpt', 'is_published','created_at'];

		$result = $this
			->startConditions()
			->select($columns)
			->where('theme_category_id', $id)
			->where('is_published', 1)
			->paginate($countPost);

		return $result;
	}
	public function getEdit($id){
		return $this->startConditions()->find($id);
	}
}