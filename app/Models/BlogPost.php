<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogPost extends Model
{

	use SoftDeletes;
	
	protected $fillable = [
    	'id', 'blog_category_id', 'user_id', 'bc_title',  'slug', 'bc_keyword','bc_description', 'bc_excerpt',
	    'bc_text', 'bc_image', 'is_published'

    ];

    public function category(){
	    return $this->belongsTo(BlogCategory::class, 'blog_category_id', 'id');
    }

	public function comments(){
		return $this->hasMany(BlogPostsComment::class);
	}

	public function user(){
		return $this->belongsTo(User::class, 'user_id', 'id');
	}
}
