<?php

    include "config.php";

    $id = $_REQUEST['id'];
    $JobTitle = $_REQUEST['JobTitle'];
    $Country = $_REQUEST['Country'];
    $CompName = $_REQUEST['CompName'];
    $Details = $_REQUEST['Details'];

    $query = "UPDATE job_listings SET JobTitle='$JobTitle', Country='$Country', CompName='$CompName' , Details='$Details' WHERE id='$id'";

    if (mysqli_query($conn, $query)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

    mysqli_close($conn);

?>
