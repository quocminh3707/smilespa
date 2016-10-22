<?php
require $_SERVER['DOCUMENT_ROOT'] . '/spa/include/db.php';

// echo "<pre>";
// print_r($_GET);
// exit();


if(isset($_GET['id']))
{

	$dichvu = Model_DangKyDichVu::find($_GET['id']);
	$id = $dichvu["khachhang_id"];
	$dichvu->delete();

 	header("Location: ../dangky-dichvu/dangky-dichvu.php?id=$id");
}
?>