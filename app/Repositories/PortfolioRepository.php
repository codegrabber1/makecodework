<?php
namespace App\Repositories;

use App\Models\Portfolio as Model;

class PortfolioRepository extends BaseRepository {
	/**
	 * Getting the model of a database of the categories.
	 * @var Model
	 * @return mixed|string
	 */
	protected function getModel()
	{
		return Model::class;
	}

	public function getAllItems(){
		$columns = ['id','portfolio_category_id', 'user_id', 'title', 'slug', 'img', 'keyword', 'description',
		            'title_task', 'task_description', 'site_link', 'is_published'];

		return $this->startConditions()
				->select($columns)
				->get();
	}

	public function getItemsForIndex($count){
		$column = ['id','portfolio_category_id', 'title', 'slug', 'img'];

		return $this->startConditions()
				->select($column)
				->limit($count)
				->get();
	}
	public function getEdit($id){
		return $this->startConditions()->find($id);
	}

}
