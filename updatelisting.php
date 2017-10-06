<?php

	include "config.php";
	
	$id = $_REQUEST['id'];
	$JobTitle = $_REQUEST['JobTitle'];
	$Country = $_REQUEST['Country'];
	$CompName = $_REQUEST['CompName'];
	$Details = $_REQUEST['Details'];

	$result = mysql_query("UPDATE job_listings SET JobTitle='$JobTitle', Country='$Country', CompName='$CompName' , Details='$Details' WHERE id='$id' ",$connect);
	
	echo $JobTitle;
	
?>
