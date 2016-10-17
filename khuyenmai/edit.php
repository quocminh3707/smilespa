<?php
require $_SERVER['DOCUMENT_ROOT'] . '/spa/include/db.php';

if(isset($_POST['id'])){

	$khuyenmai = Model_KhuyenMai::find($_POST['id']);
	$khuyenmai->MaKM = $_POST['MaKM2'];
	$khuyenmai->TenKM = $_POST['TenKM2'];
	$khuyenmai->LoaiKM = $_POST['LoaiKM2'];
	$khuyenmai->PhanTram = $_POST['PhanTram2'];
	$khuyenmai->SoTien = $_POST['SoTien2'];
	$khuyenmai->MaCoSo = $_POST['MaCoSo2'];
	$khuyenmai->save();

	header("Location: ../khuyen-mai.php");
}

?>