<?php
require $_SERVER['DOCUMENT_ROOT'] . '/spa/include/db.php';


if(isset($_POST['selected'])){
	foreach($_POST['selected'] as $id){
		$dichvu = Model_DichVu::find($id);
		$dichvu->lieutrinhs()->delete();
		$dichvu->delete();
	}	
}
header("Location: ../dich-vu.php"); 