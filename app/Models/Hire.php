<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hire extends Model
{
	protected $fillable = ['id','username', 'useremail', 'userephone', 'usermessage', 'webtype'];
}
