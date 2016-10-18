<?php 

require $_SERVER['DOCUMENT_ROOT'] . '/spa/include/db.php';

// echo "<pre>";
// print_r($_POST);

//show all dich vu
$DichVu_id = $_POST['DichVu_id'];
$dichvu = Model_DichVu::find($DichVu_id);

//show all khuyen mai
$KhuyenMai_id = $_POST['KhuyenMai_id'];
$khuyenmai = Model_KhuyenMai::find($KhuyenMai_id);


$SoLanDieuTri_id = $_POST['SoLanDieuTri_id'];

//lan thanh toan


if (isset($_POST['submit'])) {

	$dangkydichvu = new Model_DangKyDichVu();

	$dangkydichvu = new Model_DangKyDichVu();
	$dangkydichvu->DichVu_id = $_POST['DichVu_id'];
	$dangkydichvu->GiaDichVu = $dichvu->DonGia;
	$dangkydichvu->KhuyenMai_id = $_POST['KhuyenMai_id'];
	$dangkydichvu->NhanVienTuVan = $_POST['NhanVienTuVan'];
	

	if($khuyenmai->KhuyenMai_id == 0){
		$dangkydichvu->GiaKhuyenMai = "0";
	}else{
		if($khuyenmai->LoaiKM == 1){
			//tien
			$dangkydichvu->GiaKhuyenMai = $khuyenmai->SoTien;
		}else{
			//phantram
			$dangkydichvu->GiaKhuyenMai = $khuyenmai->PhanTram;
		}
	}
	
	$dangkydichvu->SoLanDieuTri_id = $SoLanDieuTri_id;
	$dangkydichvu->khachhang_id = $_POST['khachhang_id'];
	$dangkydichvu->save();

	header("Location: ../dangky-dichvu/dangky-dichvu.php");
}
?>
