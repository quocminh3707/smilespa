<?php
require $_SERVER['DOCUMENT_ROOT'] . '/spa/include/db.php';

if(isset($_GET['id']))
{

	$mypham = Model_MyPham::find($_GET['id']);
	echo $mypham->toJson();
}
?>