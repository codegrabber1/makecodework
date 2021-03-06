<?php
namespace App\Repositories;
use App\Models\ThemeCategory as Model;

class TutorialCategoryRepository extends BaseRepository {

	protected $model;

	protected function getModel() {
		return Model::class;
	}

	public function getAllItems() {
		$columns = [
			'id',
			'theme_id',
			'user_id',
			'th_cat_img',
			'th_cat_name',
			'slug',
			'is_published',
			'created_at'
		];
		$result = $this
			->startConditions()
			->select($columns)
			->get();

		return $result;
	}

	public function getForSelect(){
		$columns = ['id','th_cat_name','is_published'];

		$result = $this
			->startConditions()
			->select($columns)
			->where('is_published',1)
			->get();

		return $result;
	}

	/**
	 * @param $id - the id of theme (Java,php,Javascript).
	 *
	 * @return mixed
	 */
	public function getAllItemsForFrontend($caountPosts = null, $id){
		$columns = ['id','th_cat_name','theme_id', 'user_id', 'th_cat_img','is_published', 'created_at'];

		$result = $this
			->startConditions()
			->select($columns)
			->where('theme_id', $id)
			->where('is_published', 1)
			->paginate($caountPosts);

		return $result;
	}

	public function getEdit($id){
		return $this->startConditions()->find($id);
	}
}