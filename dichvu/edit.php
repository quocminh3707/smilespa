<?php
require $_SERVER['DOCUMENT_ROOT'] . '/spa/include/db.php';


if(isset($_POST['id']))
{

	$dichvu = Model_dichvu::find($_POST['id']);
	$dichvu->MaDichVu = $_POST['MaDichVu'];
	$dichvu->TenDichVu = $_POST['TenDichVu'];
	$dichvu->TinhTrang = $_POST['TinhTrang'];
	$dichvu->CoSo_Id = $_SESSION['coso'];
	$dichvu->DonGia = $_POST['DonGiaED'];
	$dichvu->save();
	$suathanhcong ="<div class='alert alert-info'>
						<button class='close' data-dismiss='alert'>
							<i class='ace-icon fa fa-times'></i>
						</button>
						<i class='ace-icon fa fa-hand-o-right'></i>
						Bạn đã chỉnh sữa dịch vụ thành công
					</div>
					";
		$_SESSION['thongbaosua'] = $suathanhcong;
	header("Location: ../dich-vu.php");
}
?>