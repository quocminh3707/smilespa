<?php
require $_SERVER['DOCUMENT_ROOT'] . '/spa/include/db.php';

if(isset($_GET['id']))
{

	$khachhang = Model_KhachHang::find($_GET['id']);
	echo $khachhang->toJson();
}
?>