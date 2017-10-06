<?php 	

	include "config.php";
	
	$id = $_REQUEST['id'];

    $result = mysql_query("DELETE FROM job_listings WHERE id='$id' ",$connect);

?>
