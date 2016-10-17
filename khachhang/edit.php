<?php
require $_SERVER['DOCUMENT_ROOT'] . '/spa/include/db.php';

print_r($_POST);
if(isset($_POST['id']))
{

	$khachhang = Model_KhachHang::find($_POST['id']);
	$khachhang->Ho = $_POST['Ho'];
	$khachhang->Ten = $_POST['Ten'];
	$khachhang->Sdt = $_POST['SdtED'];
	$khachhang->Email = $_POST['EmailED'];
	$khachhang->DiaChi = $_POST['DiaChi'];
	$khachhang->MaCoSo = $_POST['MaCoSo'];
	$khachhang->save();

	header("Location: ../khach-hang.php");
}
?>