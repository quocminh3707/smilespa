<?php
require $_SERVER['DOCUMENT_ROOT'] . '/spa/include/db.php';


if(isset($_POST['selected'])){
	foreach($_POST['selected'] as $id){
		$user = Model_User::find($id);
		$user->delete();
	}	
}
$xoathanhcong ="<div class='alert alert-danger'>
					<button class='close' data-dismiss='alert'>
						<i class='ace-icon fa fa-times'></i>
					</button>
					<i class='ace-icon fa fa-hand-o-right'></i>
					Bạn đã xóa tài khoản thành công
				</div>
				";
$_SESSION['thongbaoxoa'] = $xoathanhcong;
header("Location: ../thanh-vien.php"); 