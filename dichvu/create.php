<?php 
ob_start();
include_once '../include/dbMySql.php';
$con = new DB_con();
if (isset($_POST['submit'])) {
	$madichvu = $_POST['MaDichVu'];
	$tendichvu = $_POST['TenDichVu'];
	$macoso = $_POST['MaCoSo'];
	$trinhtrang = $_POST['TinhTrang'];
	$dongia = $_POST['DonGia'];
	
	// echo "<pre>";
	// print_r($_POST);
	// echo "</pre>";
	
	$con->Insert_DichVu($madichvu,$tendichvu,$trinhtrang,$macoso,$dongia);
	 header("Location: ../dich-vu.php");
}
?>
