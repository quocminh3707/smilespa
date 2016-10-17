<?php 

require $_SERVER['DOCUMENT_ROOT'] . '/spa/include/db.php';

if (isset($_POST['submit'])) {

	$dichvu = new Model_DichVu();

	$khachhang = new Model_KhachHang();
	$khachhang->Ho = $_POST['Ho'];
	$khachhang->Ten = $_POST['Ten'];
	$khachhang->Sdt = $_POST['Sdt'];
	$khachhang->Email = $_POST['Email'];
	$khachhang->DiaChi = $_POST['DiaChi'];
	$khachhang->MaCoSo = $_POST['MaCoSo'];
	$khachhang->save();

	header("Location: ../khach-hang.php");
}
?>
