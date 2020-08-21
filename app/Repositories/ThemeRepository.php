<?php
namespace App\Repositories;

use App\Models\Themes as Model;

class ThemeRepository extends BaseRepository {

	protected $model;

	/**
	 * @return mixed
	 */
	protected function getModel() {
		return Model::class;
	}

	public function getAllThemes($published = null, $unpublished = null){
		$columns = [
			'id','theme_name', 'theme_image', 'is_published'
		];

		$result = $this
			->startConditions()
			->select($columns)
			->where('is_published', $published)
			->orWhere('is_published', $unpublished)
			->get();
		
		return $result;
	}

	public function getForSelect(){
		$columns = ['id', 'theme_name', 'is_published'];

		$result = $this
			->startConditions()
			->select($columns)
			->where('is_published', 1)
			->get();

		return $result;
	}
	public function getForMain(){
		$columns = ['id', 'theme_name', 'theme_image', 'is_published'];

		$result = $this
			->startConditions()
			->select($columns)
			->where('is_published', 1)
			->get();

		return $result;
	}

	public function getEdit($id){
		return $this->startConditions()->find($id);
	}
}