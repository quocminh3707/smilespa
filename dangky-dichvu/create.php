<?php 

require $_SERVER['DOCUMENT_ROOT'] . '/spa/include/db.php';

// echo "<pre>";
// print_r($_POST);
// exit();
$DichVu_id = $_POST['DichVu_id'];
$dichvu = Model_DichVu::find($DichVu_id);

$KhuyenMai_id = $_POST['KhuyenMai_id'];

$SoLanDieuTri_id = $_POST['SoLanDieuTri_id'];

if (isset($_POST['submit'])) {

	$dangkydichvu = new Model_DangKyDichVu();

	$dangkydichvu = new Model_DangKyDichVu();
	$dangkydichvu->DichVu_id = $_POST['DichVu_id'];
	$dangkydichvu->KhuyenMai_id = $_POST['KhuyenMai_id'];
	$dangkydichvu->NhanVienTuVan = $_POST['NhanVienTuVan'];
	$dangkydichvu->GiaDichVu = $dichvu->DonGia;
	$dangkydichvu->KhuyenMai_id = $KhuyenMai_id;
	$dangkydichvu->SoLanDieuTri_id = $SoLanDieuTri_id;
	$dangkydichvu->khachhang_id = $_POST['khachhang_id'];
	$dangkydichvu->save();

	header("Location: ../dangky-dichvu/dangky-dichvu.php");
}
?>
