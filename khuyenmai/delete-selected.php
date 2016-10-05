<?php
require $_SERVER['DOCUMENT_ROOT'] . '/spa/include/db.php';


if(isset($_POST['selected'])){
	foreach($_POST['selected'] as $id){
		$dichvu = Model_KhuyenMai::find($id);
		$dichvu->delete();
	}	
}
header("Location: ../khuyen-mai.php"); 