<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
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
	]
}
