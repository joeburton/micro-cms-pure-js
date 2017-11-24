<?php 	

	include "config.php";
	
	$JobTitle = $_REQUEST['JobTitle'];
	$Country = $_REQUEST['Country'];
	$CompName = $_REQUEST['CompName'];
	$Details = $_REQUEST['Details'];

	$query = "INSERT INTO job_listings (JobTitle, Country, CompName, Details) VALUES ('$JobTitle','$Country','$CompName','$Details')";

	if (mysqli_query($conn, $query)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

    mysqli_close($conn);

?>
