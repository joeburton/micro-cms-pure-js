<?php 	

	include "config.php";
	
	$JobTitle = $_REQUEST['JobTitle'];
	$Country = $_REQUEST['Country'];
	$CompName = $_REQUEST['CompName'];
	$Details = $_REQUEST['Details'];

	$result = mysql_query("INSERT INTO job_listings (JobTitle, Country, CompName, Details) VALUES ('$JobTitle','$Country','$CompName','$Details')",$connect);

?>
