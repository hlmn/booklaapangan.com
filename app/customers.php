<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class customers extends Model implements Authenticatable
{
	use \Illuminate\Auth\Authenticatable;
    //public	$primaryKey 	= 'EMAIL';
    public 		$timestamps		= false;
    protected $hidden = [
        'password', 'remember_token',
    ];
}

