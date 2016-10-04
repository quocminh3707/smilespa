<?php

use Illuminate\Database\Eloquent\Model;

class Model_DichVu extends Model
{
	//asd
    protected $table = 'dichvu';

    public function lieutrinhs()
    {
        return $this->hasMany('Model_LieuTrinh', 
        	'dichvu_id');
    }
}