<?php 
require $_SERVER['DOCUMENT_ROOT'] . '/spa/include/db.php';

if (isset($_POST['submit'])) {
	
	$khuyenmai = new Model_KhuyenMai();
	$khuyenmai->MaKM = $_POST['MaKM'];
	$khuyenmai->TenKM = $_POST['TenKM'];
	$khuyenmai->LoaiKM = $_POST['LoaiKM'];
	$khuyenmai->PhanTram = $_POST['PhanTram'];
	$khuyenmai->SoTien = $_POST['SoTien'];
	$khuyenmai->MaCoSo = $_POST['MaCoSo'];
	$khuyenmai->save();
	$themthanhcong ="<div class='alert alert-success'>
						<button class='close' data-dismiss='alert'>
							<i class='ace-icon fa fa-times'></i>
						</button>
						<i class='ace-icon fa fa-hand-o-right'></i>
						Bạn đã thêm khuyến mãi thành công
					</div>
					";
	$_SESSION['thongbaothem'] = $themthanhcong;
	header("Location: ../khuyen-mai.php");
}
?>
