<?php
namespace App\Repositories;

use App\Models\BlogCategories as Model;

class CategoryRepository extends BaseRepository {
    /**
     * Getting the model of a database of the categories.
     * @var Model
     * @return mixed|string
     */
    protected function getModel()
    {
      return Model::class;
    }

    public function getAllItems() {
        $columns = [
            'id',
            'bc_name',
            'slug',
            // 'is_published',
            'created_at'
            ];
        $result = $this
            ->startConditions()
            ->select($columns)
            ->get();

        return $result;
    }

    public function getItemsForPortfolio($ispublished){
        $columns = [
          'id',
          'bc_name',
        //   'is_published'
        ];
        $result = $this
            ->startConditions()
            ->select($columns)
            // ->where('is_published', $ispublished)
            ->toBase()
            ->get();

        return $result;
    }

    public function getForFrontEnd($ispublished){
        $columns = [
            'id',
            'slug',
            'bc_name',
            // 'category_img',
            'is_published'
        ];
        $result = $this
            ->startConditions()
            ->select($columns)
            // ->where('is_published', $ispublished)
            ->toBase()
            ->get();

        return $result;
    }

    public function getEdit($id){
        return $this->startConditions()->find($id);
    }
}