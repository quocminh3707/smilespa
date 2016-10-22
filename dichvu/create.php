<?php 

require $_SERVER['DOCUMENT_ROOT'] . '/spa/include/db.php';

if (isset($_POST['submit'])) {

	$dichvu = new Model_DichVu();
	$dichvu->MaDichVu = $_POST['MaDichVu'];
	$dichvu->TenDichVu = $_POST['TenDichVu'];
	$dichvu->TinhTrang = $_POST['TinhTrang'];
	$dichvu->DonGia = $_POST['DonGia'];
	$dichvu->CoSo_Id = $_SESSION['coso'];
	$dichvu->save();
	$themthanhcong ="<div class='alert alert-success'>
						<button class='close' data-dismiss='alert'>
							<i class='ace-icon fa fa-times'></i>
						</button>
						<i class='ace-icon fa fa-hand-o-right'></i>
						Bạn đã thêm dịch vụ thành công
					</div>
					";
	$_SESSION['thongbaothem'] = $themthanhcong;
	header("Location: ../dich-vu.php");
}
?>
