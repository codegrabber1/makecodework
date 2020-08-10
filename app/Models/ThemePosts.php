<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ThemePosts extends Model
{
    use softDeletes;

    protected $fillable = [
	    'id', 'theme_category_id', 'user_id', 'p_title',  'p_slug', 'p_keywords','p_description', 'p_excerpt',
	    'p_text', 'p_image', 'is_published'
    ];

    public function category(){
    	return $this->belongsTo(ThemeCategories::class, 'theme_category_id', 'id');
    }

	public function user(){
		return $this->belongsTo(User::class, 'user_id', 'id');
	}
}
