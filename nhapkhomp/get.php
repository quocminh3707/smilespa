<?php
require $_SERVER['DOCUMENT_ROOT'] . '/spa/include/db.php';

$con = new DB_con();
$table = "dichvu";
if(isset($_GET['id']))
{
 	$id=$_GET['id'];
 	$res=$con->delete($table,$id);
 	header("Location: ../dich-vu.php"); 
}
?>