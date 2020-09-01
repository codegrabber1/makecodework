<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * @property  user_id
 */
class BlogPostsComment extends Model
{
	protected $fillable=[
		'author_name', 'author_email','comment_text', 'moderated', 'parent_id', 'user_id', 'blog_post_id'
	];
	//
	public function posts(){
		return $this->belongsTo(BlogPost::class, 'blog_post_id', 'id');
	}
	public function user(){
		return $this->belongsTo(User::class, 'user_id', 'id');
	}
}
