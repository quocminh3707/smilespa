<?php
require $_SERVER['DOCUMENT_ROOT'] . '/spa/include/db.php';


if(isset($_POST['id']))
{

	$mypham = Model_MyPham::find($_POST['id']);
	$mypham->MaMP = $_POST['MaMP'];
	$mypham->TenMP = $_POST['TenMP'];
	$mypham->CoSo_Id = $_SESSION['coso'];
	$mypham->Soluong = $_POST['SoluongED'];
	$mypham->save();
	$suathanhcong ="<div class='alert alert-info'>
						<button class='close' data-dismiss='alert'>
							<i class='ace-icon fa fa-times'></i>
						</button>
						<i class='ace-icon fa fa-hand-o-right'></i>
						Bạn đã chỉnh sữa mỹ phẩm thành công
					</div>
					";
		$_SESSION['thongbaosua'] = $suathanhcong;
	header("Location: ../danh-muc-my-pham.php");
}
?>