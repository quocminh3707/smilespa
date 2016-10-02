<?php
require $_SERVER['DOCUMENT_ROOT'] . '/spa/include/db.php';


if(isset($_POST['selected'])){
	foreach($_POST['selected'] as $id){
		$dichvu = Model_MyPham::find($id);
		$dichvu->delete();
	}	
}
header("Location: ../danh-muc-my-pham.php"); 