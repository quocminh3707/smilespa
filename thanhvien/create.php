<?php 

require $_SERVER['DOCUMENT_ROOT'] . '/spa/include/db.php';
echo "<pre>";
print_r($_POST);

if (isset($_POST['submit'])) {

	$user = new Model_User();
	$user->Ho = $_POST['Ho'];
	$user->Ten = $_POST['Ten'];
	$user->username = $_POST['username'];
	$user->password = $_POST['password'];
	$user->Sdt = $_POST['Sdt'];
	$user->Email = $_POST['Email'];
	$user->Dia_Chi = $_POST['Dia_Chi'];
	$user->Tinh_Trang = $_POST['Tinh_Trang'];
	$user->MaCoSo = $_POST['MaCoSo'];
	$user->level = $_POST['level'];
	$user->save();

	header("Location: ../thanh-vien.php");
}
?>
