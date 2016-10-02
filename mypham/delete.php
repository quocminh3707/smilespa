<?php
require $_SERVER['DOCUMENT_ROOT'] . '/spa/include/db.php';


if(isset($_GET['id']))
	{

		$dichvu = Model_MyPham::find($_GET['id']);
		$dichvu->delete();

	 	header("Location: ../danh-muc-my-pham.php"); 
	}
?>