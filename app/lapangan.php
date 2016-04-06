<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lapangan extends Model
{
	protected $table="lapangan";
	 public 		$timestamps		= false;
	protected $primaryKey = 'ID_LAPANGAN';
	public function fasor()
    {
		return $this->belongsTo('App\fasor','ID_FASOR','ID_FASOR');

	}
    
}
