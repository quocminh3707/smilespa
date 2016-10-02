<?php
require $_SERVER['DOCUMENT_ROOT'] . '/spa/include/db.php';


if(isset($_POST['selected'])){
	foreach($_POST['selected'] as $id){
		$dichvu = Model_KhachHang::find($id);
		$dichvu->delete();
	}	
}
header("Location: ../khach-hang.php"); 