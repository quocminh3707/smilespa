<?php
require $_SERVER['DOCUMENT_ROOT'] . '/spa/include/db.php';

if(isset($_POST['id'])){

	$khuyenmai = Model_KhuyenMai::find($_POST['id']);
	$khuyenmai->MaKM = $_POST['MaKM2'];
	$khuyenmai->TenKM = $_POST['TenKM2'];
	$khuyenmai->LoaiKM = $_POST['LoaiKM2'];
	$khuyenmai->PhanTram = $_POST['PhanTram2'];
	$khuyenmai->SoTien = $_POST['SoTien2'];
	$khuyenmai->MaCoSo = $_POST['MaCoSo2'];
	$khuyenmai->save();
	$suathanhcong ="<div class='alert alert-info'>
						<button class='close' data-dismiss='alert'>
							<i class='ace-icon fa fa-times'></i>
						</button>
						<i class='ace-icon fa fa-hand-o-right'></i>
						Bạn đã chỉnh sữa khuyến mãi thành công
					</div>
					";
		$_SESSION['thongbaosua'] = $suathanhcong;
	header("Location: ../khuyen-mai.php");
}

?>