<?php
require $_SERVER['DOCUMENT_ROOT'] . '/spa/include/db.php';


if(isset($_GET['id']))
	{

		$user = Model_User::find($_GET['id']);
		$user->delete();

	 	header("Location: ../thanh-vien.php"); 
	}
?>