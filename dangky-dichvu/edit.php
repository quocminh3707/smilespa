<?php
require $_SERVER['DOCUMENT_ROOT'] . '/spa/include/db.php';

echo "<pre>";
print_r($_POST);
exit();
if(isset($_POST['id']))
{

	$dangky = Model_DangKyDichVu::find($_POST['id']);
	$dangky->DichVu_id = $_POST['DichVu_id'];

	$dangky->save();

	header("Location: ../dangky-dichvu/dangky-dichvu.php?id=" . $dangky->KhachHang_id);
}
?>