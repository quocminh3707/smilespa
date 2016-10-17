<?php
require $_SERVER['DOCUMENT_ROOT'] . '/spa/include/db.php';


if(isset($_POST['id']))
{

	$mypham = Model_MyPham::find($_POST['id']);
	$mypham->MaMP = $_POST['MaMP'];
	$mypham->TenMP = $_POST['TenMP'];
	$mypham->MaCoSo = $_POST['MaCoSo'];
	$mypham->Soluong = $_POST['SoluongED'];
	$mypham->save();

	header("Location: ../danh-muc-my-pham.php");
}
?>