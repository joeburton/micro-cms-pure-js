<?php 

	include "config.php";
	
	$role = $_REQUEST['role'];
	
	//jQuery database if parameter = all show all
	if ($role == "all") {
		$query = "SELECT * FROM job_listings";
	} else {
	//Query database return all results according to parameter passed
		$query = "SELECT * FROM job_listings WHERE JobTitle='" . $role . "'";
 	}	
	
	$rs = mysql_query($query);
	
	while($row = mysql_fetch_array($rs)) {
		$rows[] = array(
		"id" => $row['id'],
		"JobTitle" => $row['JobTitle'],
		"Country" => $row['Country'],
		"CompName" => $row['CompName'],
		"Details" => $row['Details']);
	}

	$json = json_encode($rows);
	print $json;
	
	mysql_close();

?>