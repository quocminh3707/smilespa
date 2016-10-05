<?php
require $_SERVER['DOCUMENT_ROOT'] . '/spa/include/db.php';


if(isset($_GET['id']))
{

	$dichvu = Model_KhuyenMai::find($_GET['id']);
	$dichvu->delete();

 	header("Location: ../khuyen-mai.php"); 
}
?>