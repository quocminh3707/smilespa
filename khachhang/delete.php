<?php
require $_SERVER['DOCUMENT_ROOT'] . '/spa/include/db.php';


if(isset($_GET['id']))
{

	$dichvu = Model_KhachHang::find($_GET['id']);
	$dichvu->delete();

 	header("Location: ../khach-hang.php"); 
}
?>