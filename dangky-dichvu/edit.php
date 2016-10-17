<?php
require $_SERVER['DOCUMENT_ROOT'] . '/spa/include/db.php';


if(isset($_POST['id']))
{

	$dangky = Model_DangKyDichVu::find($_POST['id']);
	$dangky->DichVu_id = $_POST['DichVu_id'];

	$dangky->save();

	header("Location: ../dangky-dichvu/dangky-dichvu.php");
}
?>