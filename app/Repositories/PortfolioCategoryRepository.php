<?php

namespace App\Repositories;

use App\Models\PortfolioCategory as Model;

class PortfolioCategoryRepository extends BaseRepository {

	/**
	 * @return mixed
	 */
	protected function getModel() {
		return Model::class;
	}

	/**
	 * @return mixed
	 */
	public function getAllItems(){
		$columns =['id','pc_name', 'slug', 'is_published'];

		$result = $this
			->startConditions()
			->select($columns)
			->get();

		return $result;
	}

	public function getForSelect(){
		$columns = ['id', 'pc_name'];
		$result = $this->startConditions()
				->select($columns)
				->get();

		return $result;
	}

	public function getEdit($id){
		return $this->startConditions()->find($id);
	}
}