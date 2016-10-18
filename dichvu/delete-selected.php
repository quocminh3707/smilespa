<?php
require $_SERVER['DOCUMENT_ROOT'] . '/spa/include/db.php';


if(isset($_POST['selected'])){
	foreach($_POST['selected'] as $id){
		$dichvu = Model_DichVu::find($id);
		$dichvu->delete();
	}	
}
$xoathanhcong ="<div class='alert alert-danger'>
						<button class='close' data-dismiss='alert'>
							<i class='ace-icon fa fa-times'></i>
						</button>
						<i class='ace-icon fa fa-hand-o-right'></i>
						Bạn đã xóa dịch vụ thành công
					</div>
					";
$_SESSION['thongbaoxoa'] = $xoathanhcong;
header("Location: ../dich-vu.php"); 