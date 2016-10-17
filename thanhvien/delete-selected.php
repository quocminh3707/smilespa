<?php
require $_SERVER['DOCUMENT_ROOT'] . '/spa/include/db.php';


if(isset($_POST['selected'])){
	foreach($_POST['selected'] as $id){
		$user = Model_User::find($id);
		$user->delete();
	}	
}
header("Location: ../thanh-vien.php"); 