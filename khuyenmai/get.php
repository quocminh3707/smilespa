<?php
require $_SERVER['DOCUMENT_ROOT'] . '/spa/include/db.php';

if(isset($_GET['id']))
{

	$dichvu = Model_DichVu::find($_GET['id']);
	echo $dichvu->toJson();
}
?>