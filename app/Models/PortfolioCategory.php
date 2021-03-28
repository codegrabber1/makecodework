<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PortfolioCategory extends Model
{
    use SoftDeletes;

    protected $fillable = ['pc_name', 'slug', 'is_published'];

    public function portfolio_category(){
    	return $this->hasMany( Portfolio::class);
    }
}
