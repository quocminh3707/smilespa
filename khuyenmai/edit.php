<?php
require $_SERVER['DOCUMENT_ROOT'] . '/spa/include/db.php';

print_r($_POST);
if(isset($_POST['id']))
{

	$khuyenmai = Model_KhuyenMai::find($_POST['id']);
	$khuyenmai->MaKM = $_POST['MaKM'];
	$khuyenmai->TenKM = $_POST['TenKM'];
	$khuyenmai->PhanTram = $_POST['PhanTram'];
	$khuyenmai->SoTien = $_POST['SoTien'];
	$khuyenmai->CoSo_id = $_POST['CoSo_id'];
	$khuyenmai->save();
	header("Location: ../khuyen-mai.php");
}

?>