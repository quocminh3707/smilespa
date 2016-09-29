<?php
include_once '../include/dbMySql.php';

$con = new DB_con();
$table = "dichvu";
if(isset($_GET['id']))
{
	print_r($_GET);
 	$id=$_GET['id'];
 	$res=$con->delete($table,$id);
 	header("Location: ../dich-vu.php"); 
}
?>