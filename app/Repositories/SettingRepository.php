<?php
/**
 * Created by PhpStorm.
 * User: beon
 * Date: 10.09.2020
 * Time: 00:04
 */

namespace App\Repositories;

use App\Setting as Model;

class SettingRepository extends BaseRepository {

	protected $model;

	protected function getModel() {
		return Model::class;
	}

	public function getAllSettings(){
		$columns = ['id', 'logo', 'phone', 'email', 'description'];

		$result = $this
			->startConditions()
			->select($columns)
			->get();

		return $result;
	}

	public function getSettings(){

		return $this->startConditions()->first();
	}

	public function getEdit($id){
		return $this->startConditions()->find($id);
	}

}