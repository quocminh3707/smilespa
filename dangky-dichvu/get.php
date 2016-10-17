<?php
require $_SERVER['DOCUMENT_ROOT'] . '/spa/include/db.php';

if(isset($_GET['id']))
{

	$dangkydichvu = Model_DangKyDichVu::find($_GET['id']);
	echo $dangkydichvu->toJson();
}
?>