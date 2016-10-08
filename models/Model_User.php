<?php

use Illuminate\Database\Eloquent\Model;

class Model_User extends Model
{
	//asd
    protected $table = 'user';

    public function permissions()
    {
        return $this->hasOne('Model_Permisson', 
        	'user_id');
    }
}