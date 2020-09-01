<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * @property  user_id
 */
class ThemePostsComment extends Model
{
	protected $fillable=[
		'author_name', 'author_email','comment_text', 'moderated', 'parent_id', 'user_id'
	];
	//
	public function posts(){
		return $this->belongsTo(ThemePost::class);
	}
	public function user(){
		return $this->belongsTo(User::class, 'user_id', 'id');
	}
}
