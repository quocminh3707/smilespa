<?php 

require $_SERVER['DOCUMENT_ROOT'] . '/spa/include/db.php';

if (isset($_POST['submit'])) {

	$khachhang = new Model_KhachHang();
	$khachhang->Ho = $_POST['Ho'];
	$khachhang->Ten = $_POST['Ten'];
	$khachhang->Sdt = $_POST['Sdt'];
	$khachhang->Email = $_POST['Email'];
	$khachhang->DiaChi = $_POST['DiaChi'];
	$khachhang->CoSo_id = $_POST['CoSo_id'];
	$khachhang->save();

	header("Location: ../khach-hang.php");
}
?>
