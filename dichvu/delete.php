<?php
include_once './include/dbMySql.php';
$con = new DB_con();
$table = "dich_vu";
if(isset($_GET['delete_id']))
{
 $id=$_GET['delete_id'];
 $res=$con->delete($table,$id);
}
?>