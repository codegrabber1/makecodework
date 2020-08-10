<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Themes extends Model
{
	use softDeletes;
	protected $fillable = ['id','theme_name', 'theme_image', 'is_published'];


	public function themeCategory(){
		return $this->hasMany(ThemeCategories::class);
	}
}
