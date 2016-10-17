<?php
require $_SERVER['DOCUMENT_ROOT'] . '/spa/include/db.php';


if(isset($_POST['id']))
{

	$dichvu = Model_dichvu::find($_POST['id']);
	$dichvu->MaDichVu = $_POST['MaDichVu'];
	$dichvu->TenDichVu = $_POST['TenDichVu'];
	$dichvu->TinhTrang = $_POST['TinhTrang'];
	$dichvu->MaCoSo = $_POST['MaCoSo'];
	$dichvu->DonGia = $_POST['DonGiaED'];
	$dichvu->save();

	header("Location: ../dich-vu.php");
}
?>