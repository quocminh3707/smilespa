<?php 

require $_SERVER['DOCUMENT_ROOT'] . '/spa/include/db.php';

if (isset($_POST['submit'])) {

	$dichvu = new Model_DichVu();
	$dichvu->MaDichVu = $_POST['MaDichVu'];
	$dichvu->TenDichVu = $_POST['TenDichVu'];
	$dichvu->MaCoSo = $_POST['MaCoSo'];
	$dichvu->TinhTrang = $_POST['TinhTrang'];
	$dichvu->DonGia = $_POST['DonGia'];
	$dichvu->save();

	header("Location: ../dich-vu.php");
}
?>
