<?php

use Illuminate\Database\Eloquent\Model;

class Model_DangKyDichVu extends Model
{
    protected $table = 'dangky';

	public function dichvu_conect()
    {
        return $this->hasMany('Model_DichVu', 'id');
    }
}