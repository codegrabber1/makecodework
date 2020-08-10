<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ThemeCategories extends Model
{
    use softDeletes;
	protected $fillable = [
		'id',
		'theme_id',
		'user_id',
		'th_cat_img',
		'th_cat_name',
		'slug',
		'is_published',
	];

	public function theme() {
		return $this->belongsTo(Themes::class);
	}

	public function user(){
		return $this->belongsTo(User::class);
	}
}
