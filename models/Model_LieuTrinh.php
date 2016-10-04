<?php

use Illuminate\Database\Eloquent\Model;

class Model_LieuTrinh extends Model
{
    protected $table = 'lieutrinh';

    public function dichvu()
    {
        return $this->belongsTo('Model_DichVu');
    }
}