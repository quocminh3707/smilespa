<?php

use Illuminate\Database\Eloquent\Model;

class Model_DangKyDichVu extends Model
{
    protected $table = 'dangky';

    public function khachhang()
    {
        return $this->hasOne('Model_KhachHang', 'id', 'khachhang_id');
    }

	public function dichvu()
    {
        return $this->hasOne('Model_DichVu', 'id', 'DichVu_id');
    }
    public function khuyenmai()
    {
        return $this->hasOne('Model_KhuyenMai', 'id', 'KhuyenMai_id');
    }
    public function dieutri()
    {
        return $this->hasOne('Model_DieuTri', 'id', 'SoLanDieuTri_id');
    }
    public function lanthanhtoan()
    {
        return $this->hasOne('Model_LanThanhToan', 'id', 'LanThanhToan_id');
    }
}