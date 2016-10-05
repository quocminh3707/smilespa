<?php 

require $_SERVER['DOCUMENT_ROOT'] . '/spa/include/db.php';


if (isset($_POST['submit'])) {
	$khuyenmai = new Model_KhuyenMai();
	$khuyenmai->MaKM = $_POST['MaKM'];
	$khuyenmai->TenKM = $_POST['TenKM'];
	$khuyenmai->PhanTram = $_POST['PhanTram'];
	$khuyenmai->SoTien = $_POST['SoTien'];
	$khuyenmai->save();

	header("Location: ../khuyen-mai.php");
}
?>
