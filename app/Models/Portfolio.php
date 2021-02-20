<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Portfolio extends Model
{
    use SoftDeletes;

    protected $fillable = ['id','portfolio_category_id','user_id', 'title', 'slug', 'img', 'keyword', 'description',
                           'title_task', 'task_description', 'site_link', 'is_published'];

    public function p_category(){
    	return $this->belongsTo( PortfolioCategory::class, 'portfolio_category_id', 'id');
    }

    public function user(){
        return $this->belongsTo( User::class, 'user_id', 'id');
	}
}
