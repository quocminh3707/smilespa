<?php
require $_SERVER['DOCUMENT_ROOT'] . '/spa/include/db.php';


if(isset($_GET['id']))
{

	$dichvu = Model_KhuyenMai::find($_GET['id']);
	$dichvu->delete();
	$xoathanhcong ="<div class='alert alert-danger'>
						<button class='close' data-dismiss='alert'>
							<i class='ace-icon fa fa-times'></i>
						</button>
						<i class='ace-icon fa fa-hand-o-right'></i>
						Bạn đã xóa khuyến mãi thành công
					</div>
					";
		$_SESSION['thongbaoxoa'] = $xoathanhcong;
 	header("Location: ../khuyen-mai.php"); 
}
?>