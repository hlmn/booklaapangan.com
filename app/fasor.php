<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fasor extends Model
{
	protected $table="fasor";
	//protected $primaryKey = 'ID_FASOR';
	public function lapangan()
    {
  		return $this->hasMany('App\lapangan','ID_FASOR','ID_FASOR');
    }
  
}
