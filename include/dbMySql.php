<?php
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'smilespa');

class DB_con
{
	 function __construct()
	 {
		  $conn = mysql_connect(DB_SERVER,DB_USER,DB_PASS) or die('localhost connection problem'.mysql_error());
		  mysql_select_db(DB_NAME, $conn);
	 }
	 //////////////////////////////////////////////////////////////////////// DICH VU
	 public function Insert_DichVu($madichvu,$tendichvu,$macoso,$trinhtrang,$dongia)
	 {
	  $res = mysql_query("INSERT INTO dichvu VALUES('','$madichvu','$tendichvu','$macoso','$trinhtrang','$dongia')");
	  return $res;
	 }	
	 public function Select($Table)
	{
	  $res=mysql_query("SELECT * FROM $Table");
	  return $res;
	 }	
	 
	public function delete($table,$id)
	 {
	  $res = mysql_query("DELETE FROM $table WHERE user_id=".$id);
	  return $res;
	 }
	 ////////////////////////////////////////////////////////////////////////
}

?>