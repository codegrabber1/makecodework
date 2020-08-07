<?php
namespace App\Repositories;
use App\Models\ThemeCategories as Model;

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
}