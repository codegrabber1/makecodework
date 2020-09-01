<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogCategory extends Model
{
     use SoftDeletes;

     protected $fillable = ['id','bc_name', 'slug', 'is_published'];

	public function blog_post(){
		return $this->hasMany(BlogPost::class);
	}
	public function user(){
		return $this->belongsTo(User::class);
	}
}
