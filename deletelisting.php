<?php 	

    include "config.php";

    $id = $_REQUEST['id'];

    $query = "DELETE FROM job_listings WHERE id=" . $id;

    mysqli_query($conn, $query);

?>
