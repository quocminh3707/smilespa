<?php
require $_SERVER['DOCUMENT_ROOT'] . '/spa/include/db.php';


if(isset($_POST['id']))
{

	$user = Model_User::find($_POST['id']);
	$user->Ho = $_POST['HoED'];
	$user->Ten = $_POST['TenED'];
	$user->username = $_POST['usernameED'];
	$user->password = $_POST['passwordED'];
	$user->Sdt = $_POST['SdtED'];
	$user->Email = $_POST['EmailED'];
	$user->Dia_Chi = $_POST['Dia_ChiED'];
	$user->Tinh_Trang = $_POST['Tinh_TrangED'];
	$user->level = $_POST['levelED'];
	$user->save();

	header("Location: ../thanh-vien.php");
}
?>