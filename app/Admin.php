<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model implements Authenticatable
{
	use \Illuminate\Auth\Authenticatable;

	protected $fillable = [
	    'username',
	    'password',
	    'full_name',
	    'photo',
	    'contact_no',
	    'about',
	    'email',
	    'background',
	    'active',
	];
}
