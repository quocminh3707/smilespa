<?php
require $_SERVER['DOCUMENT_ROOT'] . '/spa/include/db.php';

if(isset($_GET['id']))
{

	$user = Model_User::find($_GET['id']);
	echo $user->toJson();
}
?>