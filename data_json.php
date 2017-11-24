<?php 

    include "config.php";

    $role = $_REQUEST['role'];

    if ($role == "all") {
        $query = "SELECT * FROM job_listings";
    } else {
        $query = "SELECT * FROM job_listings WHERE JobTitle='" . $role . "'";
    }

    if ($result = mysqli_query($conn, $query)) {
        $out = array();

        while ($row = $result->fetch_assoc()) {
         $out[] = $row;
        }

        $json = json_encode($out);

        print $json;

        mysqli_free_result($result);

    }

    mysqli_close($conn);

?>