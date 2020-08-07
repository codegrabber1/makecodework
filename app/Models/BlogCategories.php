<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogCategories extends Model
{
    //use SoftDeletes;
	 protected $fillable = ['id','bc_name', 'slug'];
}
