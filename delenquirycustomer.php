<?php 
	include("dbconnect.php");
	if(isset($_GET['MRNNO']))
	{
		extract($_POST);
		include("dbconnect.php");
		$c=mysql_query("delete from eqcmast where MRNNO=".$_GET['MRNNO']);
		$d=mysql_query("delete from eqctrans where MRNNO=".$_GET['MRNNO']);
		if($c==1 & $d==1)
		{
			?><script>alert("Record Deleted Succssfully.....!"); location.replace("enquirycustomer.php"); </script><?php
		}
		else
		{
			?><script>alert("Record Not Deleted.....!"); location.replace("enquirycustomer.php"); </script><?php
		}
	}
?>