<?php
require $_SERVER['DOCUMENT_ROOT'] . '/spa/include/db.php';

if(isset($_GET['id']))
{

	$lanthanhtoan = Model_LanThanhToan::find($_GET['id']);
	echo $lanthanhtoan->toJson();
}
?>