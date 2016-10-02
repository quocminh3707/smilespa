<?php
require $_SERVER['DOCUMENT_ROOT'] . '/spa/include/db.php';

print_r($_POST);
if(isset($_POST['id']))
{

	$dichvu = Model_DichVu::find($_POST['id']);
	$dichvu->MaDichVu = $_POST['MaDichVu'];
	$dichvu->TenDichVu = $_POST['TenDichVu'];
	$dichvu->MaCoSo = $_POST['MaCoSo'];
	$dichvu->TinhTrang = $_POST['TinhTrang'];
	$dichvu->DonGia = $_POST['DonGiaED'];
	$dichvu->save();

	header("Location: ../dich-vu.php");
}
?>